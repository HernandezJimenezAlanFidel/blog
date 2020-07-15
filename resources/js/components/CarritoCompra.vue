<template>
    <div class="card card-primary">
    <div class="modal fade" id="respuesta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
                <div class="alert alert-success" role="alert">
                    ¡Compra realizada exitosamente!
                </div>
        </div>
    </div>
    <input type="hidden" name="_token" :value="csrf">
        <div class="card-header">
            <h3 class="card-title">Costo del servicio</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i>
                    </button>
                </div>
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Productos</h3>
                    </div>
                    <!-- /.card-header -->
                    <div id="app" class="card-body p-0">
                        <table id="tablaventa" name="tablon" class="table table-striped">
                        <thead>
                            <tr>
                            <th style="width: 10px">#</th>
                            <th>Servicio</th>
                            <th>Cantidad</th>
                            <th style="width: 40px">Precio</th>
                            <th>..</th>

                            </tr>
                        </thead>
                        <tbody>

                            <tr v-for="(producto,index) in productos">
                                <td :name="index">{{ producto.numero }}</td>
                                <td :name="producto.nombre">{{ producto.nombre }}</td>
                                <td><input type="text" class="form-control" :id="producto.input.id" :name="producto.input.id" v-model="producto.cantidad" @change="validacion(index)" placeholder="" step=0 min=0 max=10> </td>
                                <td><label :name="producto.precio* producto.cantidad">${{ (producto.precio* producto.cantidad)}}</label></td>
                                <td><a id=eliminar href="#" @click="eliminarNota(index)" data-toggle=modal><i class="fas fa-trash"></i></a></td>
                            </tr>
                        </tbody>
                        </table>
                    </div>

                </div>
            </div>
                <!-- /.card-body -->
        </div>
            <!-- Button -->
            <!--Ojo.--El boton se encuentra dentro de la tabla-->
            <div class="row">
                <div class="col-7 ml-3 toast-header">
                    <span class="mr-auto ml-5">TOTAL</span>
                </div>
                <div class="col-4 toast-header">
                    <span class="ml-3">${{ total_a_pagar[0].tot }}</span>
                </div>
            </div>
            <select id="formaPago" class="custom-select" name="formaPago" @change="changeMetodo($event)">
                <option value="" selected disabled>Seleccione Forma de Pago</option>
                <option v-for="metodo in metodos_pago" :value="metodo.code" :key="metodo.code">{{ metodo.forma }}</option>
            </select>
            <input type="submit" @click="formSubmit" value="Generar Compra" class="btn btn-success float-right">

    </div>

</template>
<script>
export default {
    data: function() {
        return {
            selected_metodo_pago: 0,
            metodos_pago: [
                {code:1, forma: 'Efectivo'},
                {code:2, forma: 'Tarjeta de Credito'}
            ],
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            total_a_pagar:[
                {
                    tot:0
                }
                ],
            productos:[]
        }
    },
    methods: {
        changeMetodo:function(event){
            this.selected_metodo_pago = event.target.options[event.target.options.selectedIndex].value
        },
        createRow:function(productos,total_a_pagar){
                $("#botones button").click(function(){
                    let filas=1;
                        let pos=0;
                        let ide=$(this).attr('id');
                        total_a_pagar[0].tot=0;
                        let prod = 0;
                        for (prod = 0; prod < productos.length; prod++) {
                            if(productos[prod].id===ide){
                                productos[prod].cantidad= parseInt(productos[prod].cantidad)+1;
                                pos=-1;
                            }
                            let t= productos[prod].cantidad*productos[prod].precio;
                            total_a_pagar[0].tot+=t;
                        }

                        if(pos==0){
                            productos.push({
                                id:$(this).attr('id'),
                                numero:"#"+filas,
                                nombre:$(this).attr('name'),
                                input:{
                                    id:($(this).attr('name').split(' ')).join('')
                                },
                                precio:parseFloat($(this).val()),
                                cantidad:1
                            });
                            let t= productos[prod].cantidad*productos[prod].precio;
                            total_a_pagar[0].tot+=t;
                        }
            })
        },
        eliminarNota:function(index){
            this.productos.splice(index, 1);
        },
        validacion: function(index){
            let parseo=this.productos[index].cantidad*3;
            if(isNaN(parseo) || parseo<1){
                this.productos[index].cantidad=1;
            }
            let prod = 0;
            this.total_a_pagar[0].tot=0;
            for (prod = 0; prod < this.productos.length; prod++) {
                let t= this.productos[prod].cantidad*this.productos[prod].precio;
                this.total_a_pagar[0].tot+=t;
            }
        },
        formSubmit:function(e) {
                if(this.productos.length>0 && this.selected_metodo_pago!=0 && this.total_a_pagar[0].tot>0){
                    e.preventDefault();
                    let currentObj = this;
                    axios.post('/registrarcompra', {

                        compra: this.productos,
                        metodo_pago: this.selected_metodo_pago,
                        total:this.total_a_pagar[0].tot

                    })
                    .then((response)=> {
                        document.getElementById('formaPago').selectedIndex=0;
                        this.selected_metodo_pago =0;
                        this.total_a_pagar[0].tot=0;
                        this.productos=[];
                        $('#respuesta').modal('show');
                        this.createRow(this.productos,this.total_a_pagar);
                        currentObj.output = response.data;
                        window.location.href='/impresion?id='+response.data.idVenta;

                    })
                    .catch(function (error) {

                        currentObj.output = error;

                    });
                }
        }
    },
    mounted() {
        this.createRow(this.productos,this.total_a_pagar);
    }
}
</script>

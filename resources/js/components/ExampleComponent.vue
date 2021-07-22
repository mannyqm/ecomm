<template>
    <div>
        <h1 class="text-center">Gestionar Productos</h1>
        <hr>

        <button @click="modificar=false;  abrirModal();" type="button" class="btn btn-primary my-4">
        Nuevo
        </button>

        <!-- The Modal -->
        <div class="modal" :class="{mostrar:modal}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">{{ tituloModal }}</h4>
                        <button @click="cerrarModal();" type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <!-- <div class="my-4">
                            <label for="nombre">Nombre</label>
                            <div v-if="modificar === true">
                                <input v-model="producto.nombre" type="text" class="form-control" id="nombre" placeholder="Nombre del Producto">
                            </div>
                            <div v-else>
                                <input v-model=" camiseta.name " type="text" class="form-control" id="nombre" placeholder="Nombre del Producto">
                            </div>
                        </div>
                        <div class="my-4">
                            <label for="descripcion">Descripcion</label>
                            <div v-if="modificar === true">
                                <textarea v-model="producto.descripcion" type="box" class="form-control" id="descripcion" placeholder="Descripcion del Producto"></textarea>
                            </div>
                            <div v-else>
                                <input v-model=" camiseta.description " type="text" class="form-control" id="nombre" placeholder="Nombre del Producto">
                            </div>
                        </div>
                        <div class="my-4">
                            <label for="color">Color</label>
                            <div v-if="modificar === true">
                                <select v-model="producto.color" class="form-control" id="color">
                                    <option v-for="colores in colores" :key="colores.id">{{colores.colors}}</option>
                                </select>
                            </div>
                            <div v-else>
                                <select v-model="producto.color" class="form-control" id="color">
                                    <option v-for="colores in colores" :key="colores.id">{{colores.colors}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="my-4">
                            <label for="sexo">Sexo</label>
                            <div v-if="modificar === true">
                                <select v-model="producto.sexo" class="form-control">
                                    <option v-for="sexo in sexos" :key="sexo.id">{{sexo.sex}}</option>
                                </select>
                            </div>
                            <div v-else>
                                <select v-model="producto.sexo" class="form-control">
                                    <option v-for="sexo in sexos" :key="sexo.id">{{sexo.sex}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="my-4">
                            <label for="talla">Talla</label>
                            <div v-if="modificar === true">
                                <select v-model="producto.talla" class="form-control">
                                    <option v-for="talla in tallas" :key="talla.id">{{talla.size}}</option>
                                </select>
                            </div>
                            <div v-else>
                                <select v-model="producto.talla" class="form-control">
                                    <option v-for="talla in tallas" :key="talla.id">{{talla.size}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="my-4">
                            <label for="precio">Precio</label>
                            <div v-if="modificar === true">
                                <input v-model="producto.precio" type="number" class="form-control" id="precio" placeholder="Precio del Producto">
                            </div>
                            <div v-else>
                                <input v-model="camiseta.price" type="number" class="form-control" id="precio" placeholder="Precio del Producto">
                            </div>
                        </div>
                        <div class="my-4">
                            <label for="stock">Stock</label>
                            <input v-model="producto.stock" type="number" class="form-control" id="stock" placeholder="Stock">
                        </div> -->
                        <form @submit.prevent="imageUpload" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="imagen">Imagen del producto</label>
                                <input type="file" @change="imageSelected" name="imagen" class="form-control-file" id="image" >
                            </div>
                        </form>
                        <div v-if="imagenPreview">
                            <img :src="imagenPreview" class="figure-img img-fluid rounded"  style="max-height:100px;">
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button @click="cerrarModal();" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button @click="idSelector(colores, sexos, tallas, producto.stock); guardarProducto();" type="button" class="btn btn-success" data-dismiss="modal">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <!-- <th scope="col">#</th> -->
                    <th scopo="col">Foto</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Color</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Talla</th>
                    <th scope="col">Stock</th>
                    <th scope="col" colspan="2" class="text-center">Accion</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="prod in productos" :key="prod.id">
                    <!-- <th scope="row">{{ prod.id }}</th> -->
                    <td>{{ prod.image }}</td>
                    <td>{{ prod.camiseta.name }}</td>
                    <td>{{ prod.camiseta.description }}</td>
                    <td>{{ prod.color.colors }}</td>
                    <td>{{ prod.sexo.sex }}</td>
                    <td>{{ prod.talla.size }}</td>
                    <td>{{ prod.stock }}</td>
                    <td>
                        <button @click="modificar=true;  abrirModal(prod);" class="btn btn-warning">Editar</button>
                    </td>
                    <td>
                        <button @click="eliminarProducto(prod.id)" class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                tituloModal: '',
                modificar: true,
                modal: 0,
                producto_id:0,
                color_id:0,
                imagen: null,
                imagenPreview: null,

                productos:[],
                camisetas:[],
                colores:[],
                sexos:[],
                tallas:[],
                camisetas:[],

                producto: {
                    nombre:'',
                    descripcion:'',
                    precio: 0,
                    color:'',
                    sexo:'',
                    talla:'',
                    stock: 1,
                    imagen:'',
                },

                camiseta: {
                    name: '',
                    description: '',
                    price: 0,
                },

                editarProducto: {
                    camiseta_id: 0,
                    color_id: 1,
                    sexo_id: 1,
                    imagen_id: 1,
                    stock: 1,
                },
            }
        },

        methods: {
            // Seccion para llamar la informacion get->All
            async listarProductos(){
                const res = await axios.get('/productos');
                this.productos = res.data;
            },
            async listarCamisetas(){
                const res = await axios.get('/camisetas');
                this.camisetas = res.data;
            },
            async listarColores(){
                const res = await axios.get('/colores');
                this.colores = res.data;
            },
            async listarSexos(){
                const res = await axios.get('/sexos');
                this.sexos = res.data;
            },
            async listarTallas(){
                const res = await axios.get('/tallas');
                this.tallas = res.data;
            },
            async listarImagenes(){
                const res = await axios.get('/imagenes');
                this.imagenes = res.data;
            },

            // Seccion para eliminar
            async eliminarProducto(producto_id){
                const res = await axios.delete('/productos/'+producto_id);
                this.listarProductos();
            },

            // Seccion para guardar 
            async guardarProducto(){
                if(this.modificar){     
                    const res = await axios.put('/productos/'+this.producto_id, this.editarProducto);
                }else{
                    // const res = await axios.post('/camisetas', this.camiseta);
                    // const resCamisetas = await axios.get('/camisetas');
                    // const index = resCamisetas.data.length;
                    // this.editarProducto.camiseta_id = resCamisetas.data[index-1].id;
                    // console.log(this.editarProducto);
                    // const resProd = await axios.post('/productos', this.editarProducto);
                    this.imageUpload();
                }
                this.cerrarModal();
                this.listarProductos();
            },
            
            abrirModal(prod={}) {
                this.modal = 1;
                this.listarCamisetas();
                this.listarColores();
                this.listarSexos();
                this.listarTallas();
                if(this.modificar){
                    this.producto_id = prod.id;
                    this.tituloModal = "Modificar Producto";
                    this.editarProducto.camiseta_id = prod.camiseta.id;
                    this.producto.nombre = prod.camiseta.name;
                    this.producto.descripcion = prod.camiseta.description;
                    this.producto.precio = prod.camiseta.price;
                    this.producto.color = prod.color.colors;
                    this.producto.sexo = prod.sexo.sex;
                    this.producto.talla = prod.talla.size;
                    this.producto.stock = prod.stock;
                }else{
                    this.tituloModal = "Crear Producto";
                    this.producto.nombre = '';
                    this.producto.descripcion = '';
                    this.producto.precio = '';
                    this.producto.color = '';
                    this.producto.sexo = '';
                    this.producto.talla = '';
                    this.producto.stock = 1;
                }
            },

            cerrarModal() {
                this.modal = 0;
            },

            idSelector(color={}, sexo={}, talla={}, stock,){

                this.editarProducto.stock = stock;

                color.forEach(color => {
                    if(this.producto.color === color.colors){
                        this.editarProducto.color_id = color.id;
                    }
                });

                sexo.forEach(sexo => {
                    if(this.producto.sexo === sexo.sex){
                        this.editarProducto.sexo_id = sexo.id;
                    }
                });

                talla.forEach(talla => {
                    if(this.producto.talla === talla.size){
                        this.editarProducto.talla_id = talla.id;
                    }
                });
            },

            imageSelected(e){
                this.imagen = e.target.files[0];

                let reader = new FileReader();
                reader.readAsDataURL(this.imagen);
                reader.onload = e => {
                    this.imagenPreview = e.target.result;
                };
            },

            imageUpload(){
                let data = new FormData;
                data.append('imagen', this.imagen);
                axios.post('/imagenes', data);
                // .then(()=>{

                // }).catch(()=>{
                //     window.location='/admin';
                // });
            },  
        },

        created(){
            this.listarProductos();
        },
    }
</script>
<style>

    .mostrar{
        display: list-item;
        opacity: 1;
        background: rgba(44, 38, 75, 0.849);
    }

</style>
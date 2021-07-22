<template>
    <div>
        <section class="jumbotron text-center">
            <div class="container">
                <h1>CAMISETAS PARA MAYORISTAS</h1>
                <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
                <p>
                    <a href="#" class="btn btn-primary my-2">Main call to action</a>
                    <a href="#" class="btn btn-secondary my-2">Secondary action</a>
                </p>
            </div>
        </section>
        <!-- <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
            <div class="col-md-5 p-lg-5 mx-auto my-5">
                <h1 class="display-4 font-weight-normal">Punny headline</h1>
                <p class="lead font-weight-normal">And an even wittier subheading to boot. Jumpstart your marketing efforts with this example based on Apple’s marketing pages.</p>
                <a class="btn btn-outline-secondary" href="#">Coming soon</a>
            </div>
            <div class="product-device shadow-sm d-none d-md-block"></div>
            <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
        </div> -->
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div v-for="prod in productos" :key="prod.id" class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                            <div class="card-body">
                                <p class="card-text">{{ prod.camiseta.name }}</p>
                                <p class="card-text">{{ prod.camiseta.description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                    </div>
                                    <small class="text-muted">$ {{ prod.camiseta.price }} c/u </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>


    </div>
</template>

<script>
    export default {
        data(){
            return{
                
                productos:[],
            }
        },

        methods:{
            async listarProductos(){
                const res = await axios.get('/productos');
                this.productos = res.data;
                console.log(this.productos);
            }
        },

        created(){
            this.listarProductos();
        },
    }
</script>

<style>

</style>
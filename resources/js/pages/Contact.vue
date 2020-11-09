<template>
    <div>
        
        <site-cover 
            title="Contáctanos"
            description="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, adipisci?"
            imgUrl="https://placeimg.com/640/480/any/sepia"
        />

        <container>
            <div class="row">
                <div class="col-md-7 mb-5">
                    <transition name="fade" mode="out-in">
                        <p v-if="sent">Tu mensaje ha sido recibido, pronto te contactaremos</p>
                        <form v-else @submit.prevent="submit" class="p-5 bg-white">  <!--@submit.prevent envia el objeto pero lo previene (no lo envia) y en lugar ejecute el metodo como parametro-->
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="text-black" for="name">Nombres</label>
                                    <input v-model="form.name" type="text" id="name" class="form-control" required>
                                </div>
                            </div>

                            <div class="row form-group">
                                
                                <div class="col-md-12">
                                    <label class="text-black" for="email">Email</label> 
                                    <input v-model="form.email" type="email" id="email" class="form-control" required>
                                </div>
                            </div>

                            <div class="row form-group">
                                
                                <div class="col-md-12">
                                    <label class="text-black" for="subject">Asunto</label> 
                                    <input v-model="form.subject" type="subject" id="subject" class="form-control" required>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="text-black" for="message">Mensaje</label> 
                                    <textarea v-model="form.message" name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Write your notes or questions here..." required></textarea>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <button type="submit" :disabled="working" class="btn btn-primary py-2 px-4 text-white">
                                        <span v-if="working">Enviando...</span>
                                        <span v-else>Enviar mensaje</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </transition>
                </div>
                <div class="col-md-5">
                    <div class="p-4 mb-3 bg-white">
                        <p class="mb-0 font-weight-bold">Address</p>
                        <p class="mb-4">203 Fake St. Mountain View, San Francisco, California, USA</p>

                        <p class="mb-0 font-weight-bold">Phone</p>
                        <p class="mb-4"><a href="#">+1 232 3235 324</a></p>

                        <p class="mb-0 font-weight-bold">Email Address</p>
                        <p class="mb-0"><a href="#">youremail@domain.com</a></p>
                    </div>
                </div>
            </div>
        </container>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                sent: false,
                working: false,
                form: {
                    name: '',
                    email: '',
                    subject: '',
                    message: '',
                }
            }
        },
        methods: {
            submit(){
                this.working = true;
                axios.post('/api/send', this.form)
                .then(res => {
                    this.sent = true // Estado del formulario
                    this.working=false;
                })
                .catch(err => {
                    this.sent = false;
                    this.working = false;
                });
            }
        }
    }

</script>
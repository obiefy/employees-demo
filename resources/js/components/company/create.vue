<template>
    <div>
        <div v-if="hasErrors > 0" class="alert alert-danger">
            <ul>
                <li v-for="error in errors">{{ error[0] }}</li>
            </ul>
        </div>



        <div v-if="hasCompany">
            <div class="alert alert-success">
                {{ this.message }}
            </div>
            <div class="media align-items-center">
                <a href="#" class="avatar rounded-circle mr-3">
                    <img :alt="company.name" :src="company.logo" height="100%">
                </a>
                <div class="media-body">
                    <span class="mb-0 text-sm">{{ company.name }}</span>
                </div>

                <button class="btn btn-primary text-white" @click="company={}">Create new</button>
            </div>
        </div>
        <form v-else @submit.prevent="store" enctype="multipart/form-data">

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" v-model="form.name">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" v-model="form.email">
            </div>

            <div class="form-group">
                <label for="website">Website</label>
                <input type="text" class="form-control" id="website" name="website" v-model="form.website">
            </div>

            <div class="form-group">
                <label for="logo">Logo</label>
                <input type="file" accept="image/*" @change="onImageChange" class="form-control" id="logo" name="logo">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary text-white" :disabled="loading">
                    <span v-if="loading">Saving...</span>
                    <span v-else>Save</span>
                </button>
            </div>
        </form>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "create",
        data() {
            return {
                loading: false,
                form: {
                    name: '',
                    email: '',
                    website: '',
                    logo: '',
                },
                company: {},
                message: '',
                errors: {}
            }
        },
        computed: {
            hasErrors() {
              return Object.keys(this.errors).length > 0;
            },
            hasCompany() {
                return Object.keys(this.company).length > 0;
            }
        },
        methods: {
            onImageChange(e) {
                if (!e.target.files.length) {
                    return;
                }
                this.form.logo = e.target.files[0];
            },
            getForm(){
                let form = new FormData();
                form.append('name', this.form.name);
                form.append('website', this.form.website);
                form.append('email', this.form.email);
                form.append('logo', this.form.logo);
                return form;
            },
            async store() {
                this.errors = {};
                this.company = {};
                this.message = '';
                this.loading = true;

                await axios.post('http://127.0.0.1:8080/api/company', this.getForm())
                    .then(response => {
                        this.loading = false;
                        this.message = response.data.message;
                        this.company = response.data.company;
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
                        this.loading = false;
                    });
            }
        }
    }
</script>

<style scoped>

</style>

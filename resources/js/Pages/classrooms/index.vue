<script>
import Master from "@/Pages/master.vue";
export default {
    layout:Master

}
</script>
<script setup>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

import { Head } from '@inertiajs/inertia-vue3';
import {Link} from "@inertiajs/inertia-vue3";
import {reactive, ref} from "vue";
import {Inertia} from "@inertiajs/inertia";
let props = defineProps({
  classrooms:Array
})

</script>

<template>

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="breadcrumb-wrapper py-3 mb-4">
            <span class="text-muted fw-light">Hello /</span> Yousef

        </h4>

        <div class="card overflow-hidden">
            <!-- Help Center Header -->
            <div class="help-center-header d-flex flex-column justify-content-center align-items-center">
                <h3 class="zindex-1 text-center">Hi, This is your Classrooms</h3>
                <div class="input-wrapper input-group input-group-merge zindex-1 my-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bx bx-search-alt bx-xs text-muted"></i></span>
                    <input type="text" class="form-control form-control-lg" placeholder="Find anything (features, payment or reset password)" aria-label="Search" aria-describedby="basic-addon1">
                </div>

            </div>
            <!-- /Help Center Header -->

            <!-- Popular Articles -->
            <div class="help-center-popular-articles py-5">
                <div class="container-xl">



                    <div class="row">
                        <div class="col-lg-10 mx-auto">
                            <div class="row">
                                <div v-for="classroom in classrooms" :key="classroom.id" class="col-sm-6 col-md-4 mb-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <span class="badge bg-label-secondary rounded p-2"><i class="bx bx-archive fs-3 lh-1"></i></span>

                                            <Link :href="`/dashboard/${classroom.id}`">
                                                <h5 class="mt-3">{{classroom.name}}</h5>
                                            </Link>


                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</template>

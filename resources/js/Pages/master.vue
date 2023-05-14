<script setup>

import TheSidebar from '@/Layouts/body/sidebar.vue'
import TheHeader from '@/Layouts/body/header.vue'
import TheFooter from '@/Layouts/body/footer.vue'



</script>

<template>
    <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
        <div class="layout-container ">
            <!-- Menu -->

            <TheSidebar/>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">

                <div class="content-wrapper" >
                <!-- Navbar -->
               <TheHeader/>
                <!-- / Navbar -->
                <!-- Content wrapper -->

                    <slot/>

                    <!-- Content wrapper -->
                   <TheFooter/>

                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>

                </div>
            </div>
        </div>
        <!-- / Layout page -->

    </div>
        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>


</template>


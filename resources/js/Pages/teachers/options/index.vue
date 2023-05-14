<template>
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="breadcrumb-wrapper py-3 mb-4">
                <span class="text-muted fw-light">Hello /</span> Yousef
            </h4>
    <div class="card">
        <h5 class="card-header">Options</h5>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Options</th>
                        <th>Is Correct</th>

                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <template v-for="option in options" :key="option.id">
                    <tr>
                        <td>
                            <strong>{{option.name}}</strong>
                        </td>
                        <td class="text-success" v-text=" option.isCorrect===1 ? 'The Correct Answer'  : ''"></td>
                    </tr>

                    </template>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        </div>

</template>
<script>
import Master from "@/Pages/master.vue";
export default {
    layout:Master

}
</script>
<script setup>

defineProps({
    options:Array
})
</script>

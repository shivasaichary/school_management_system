<script setup>
import TeacherAuthenticatedLayout from '@/Layouts/TeacherAuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link, useForm } from '@inertiajs/vue3';

defineProps({
    results: {
        type: Array
    }
})

const form = useForm({

})

const deleteResult = (result) => {
    form.delete(route('teacher.results.delete', result))
}

</script>


<template>
    <TeacherAuthenticatedLayout>

        <Head title="Student Results" />

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Students Result</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-black overflow-hidden shadow-2xl xl:rounded-3xl">
                    <div class="p-6">
                        <Link class="btn btn-primary" :href="route('teacher.results.create')">
                        Add New Student Result
                        </Link>
                    </div>

                    <div class="p-6 text-gray-900 bg-purple-100 overflow-x-scroll">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Student Name</th>
                                    <th>Student Code</th>
                                    <th>Subject</th>
                                    <th>Subject Code</th>
                                    <th>Marks Obtained</th>
                                    <th>Date of Exam</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr v-for="result in results" :key="result.id">
                                    <td>{{ result.id }}</td>
                                    <td>{{ result.student_name }}</td>
                                    <td>{{ result.student_code }}</td>
                                    <td>{{ result.subject_name }}</td>
                                    <td>{{ result.subject_code }}</td>
                                    <td>{{ result.marks_obtained }}</td>
                                    <td>{{ result.date_of_exam }}</td>

                                    <td>
                                        <Link :href="route('teacher.results.edit', result)" class="btn btn-secondary">
                                        Edit
                                        </Link>
                                    </td>

                                    <td>
                                        <!-- <Link :href="route('teacher.results.update', result)"
                                            class="btn btn-secondary">
                                        Delete
                                        </Link> -->

                                        <form @submit.prevent="deleteResult(result)" method="post">

                                            <button type="submit" class="btn btn-secondary">
                                                Delete
                                            </button>
                                        </form>

                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </TeacherAuthenticatedLayout>
</template>

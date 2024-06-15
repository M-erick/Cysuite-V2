<template>
    <AuthenticatedLayout>
        <!-- try to implement this as a messaging system:facebook feeds -->
        <div class="container mx-auto shadow-lg rounded-lg h-screen">
            <!-- Chatting -->
            <div class="flex flex-row justify-between bg-white h-full">

                <div class="flex flex-col w-2/5 border-r-2 overflow-y-auto">

                    <div class="border-b-2 py-4 px-2 flex justify-between" style="background-color: #AD9551">
                        <span class="text-white text-2xl"
                            style=" font-family: 'Roboto Serif', serif;font-style: normal;font-weight:400;">Issues</span>
                        <span @click="toggleForms" class="cursor-pointer text-white"
                            style=" font-family: 'Roboto Serif', serif;font-style: normal;font-weight:400;">
                            Create Issue <i class="fas fa-plus-circle text-white"></i>
                        </span>
                    </div>
                    <IssuePanel :userFilteredIssues="userFilteredIssues" />

                </div>


                <!-- end chat list -->
                <!-- message -->
                <div class="w-full h-full px-5 flex flex-col justify-between">
                    <div v-if="selectedIssue" class="flex flex-col mt-5">
                        <IssueAndResponseChat />
                        <div class="flex-grow"></div>

                        <ResponseForm />
                    </div>
                    <div v-else class="flex justify-center items-center h-full">
                        <p class="text-gray-500">
                            Select an issue to view details
                        </p>
                    </div>

                    <IssueInputForm :showNewIssue="showNewIssue" />

                    <div class="py-5">

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { ref, onMounted, computed } from "vue";
import { useStore } from "vuex";
import { usePage } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import IssuePanel from '@/Components/IssueComponent/IssuePanel.vue';
import IssueInputForm from '@/Components/IssueComponent/IssueInputForm.vue';
import IssueAndResponseChat from '@/Components/IssueComponent/IssueAndResponseChat.vue';
import ResponseForm from '@/Components/IssueComponent/ResponseForm.vue';

const store = useStore();
const { props } = usePage();
const currentUser = props.auth.user;
const showNewIssue = ref(false);
const showResponseForm = ref(true);

// Computed properties
const issues = computed(() => store.state.issues.issues);
const selectedIssue = computed(() => store.state.issues.selectedIssue);


// Fetch issues on component mount
onMounted(() => {
    store.dispatch("issues/fetchIssues");
});

const toggleForms = () => {
    showNewIssue.value = !showNewIssue.value;
    showResponseForm.value = !showResponseForm.value;
    if (showNewIssue.value) {
        store.commit('issues/setSelectedIssue', null);
    }
};

// get filtered  issues based on current user
const userFilteredIssues = computed(() => {
    return issues.value.filter((issue) => issue.user_id === currentUser.id);
});

</script>

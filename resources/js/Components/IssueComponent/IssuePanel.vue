<template>

    <!-- chat list: i'll loop through issues and response from my issue  and Response table -->
        <!-- user list: Fetch the user details from the database -->
        <div v-for="issue in userFilteredIssues" :key="issue.id"
            class="flex flex-row py-4 px-2 items-center border-b-2 cursor-pointer" @click="selectIssue(issue)" :class="{
                'selected-issue  ': isSelected(issue),
            }">

            <div class="w-full ml-3">
                <div class="text-lg font-semibold"
                    style="font-family: 'Roboto Serif', serif; font-style: normal; font-weight: 500;">
                    {{ issue.title }}
                </div>
                <div class="text-gray-800"
                    style="font-family: 'Roboto Serif', serif; font-style: normal; font-weight: 400;">
                    {{ issue.description }}
                </div>
                <div class="text-semibold " style="text-align: right;  margin-top: 0.5rem; color:#AD9551; ">
                    {{ issue.status }}
                </div>
                <div style="text-align: right; font-size: 0.75rem; margin-top: 0.5rem; color: #6b7280;">
                    {{ formatTimestamp(issue.created_at) }}
                </div>
            </div>

        </div>
</template>

<script setup>
import { ref } from "vue";
import { useStore } from "vuex";

const store = useStore();
const selectedIssueId = ref(null);

const { userFilteredIssues } = defineProps({
    userFilteredIssues: {
        required: true
    }
});

const selectIssue = async (issue) => {
    store.commit("issues/setSelectedIssue", issue);
    selectedIssueId.value = issue.id;
    await store.dispatch("issues/fetchIssueResponses", issue.id);
};

const isSelected = (issue) => {
    return issue.id === selectedIssueId.value;
};

const formatTimestamp = (timestamp) => {
    const date = new Date(timestamp);
    const options = {
        hour: "numeric",
        minute: "numeric",
        day: "numeric",
        month: "long",
        year: "numeric",
    };
    return date.toLocaleString(undefined, options);
};


</script>

<style scoped>
.selected-issue {
    /* background-color: #046a5b; */
    border-bottom-width: 6px;
    border-left-width: 6px;
    border-color: #AD9551;
}
</style>

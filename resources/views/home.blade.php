@extends('layouts.app')
@section('content')
    @if($latestFinishingTask)
        <div>
            <h3 class="text-2xl font-bold mb-8">Estimated Completion For Current
                Tasks: {{ $latestFinishingTask->humanized_estimated_completion_date }}</h3>
        </div>
    @endif
    <div id="app">
        <div class="sprints">
            <button v-for="sprint in sprints" type="button" class="sprint-button"
                    v-text="'Sprint ' + sprint.id"
                    @click="activeSprintId = sprint.id; getTasks()">
            </button>
        </div>
        <div class="min-w-[320px]">
            <label for="sprint" class="block text-sm font-medium leading-6 text-gray-900">Developer</label>
            <select id="sprint" v-model="selectedDeveloperId" @change="getTasks()"
                    class="mt-2 block max-w-xs w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <option value="">All</option>
                <template v-for="developer in developers">
                    <option :value="developer.id" v-text="developer.name"></option>
                </template>
            </select>
        </div>
        <div class="tasks flex mt-8">
            <div class="flex flex-wrap lg:gap-8 gap-4">
                <div v-for="task in tasks">
                    <div
                        class="block max-w-sm px-8 py-3 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                        <div class="mt-3">
                            <span class="mb-2 text-xl font-bold tracking-tight text-gray-900"
                                  v-text="'#' + task.id"></span>
                        </div>
                        <div>
                            <span class="mb-2 text-l font-bold tracking-tight text-gray-900" v-text="task.name"></span>
                        </div>
                        <div>
                            <span class="mb-2 text-l font-bold tracking-tight text-gray-900"
                                  v-text="task.sprint_name"></span>
                        </div>
                        <div>
                            <span class="mb-2 text-m font-medium tracking-tight text-gray-900"
                                  v-text="'Assignee: ' + task.developer_name"></span>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z"/>
                            </svg>
                            <span v-text="task.estimated_completion_date"></span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
        const {createApp, ref} = Vue

        createApp({
            data() {
                return {
                    activeSprintId: 1,
                    selectedDeveloperId: '',

                    sprints: [],
                    tasks: [],
                    developers: [],
                }
            },
            mounted() {
                this.getSprints();
                this.getTasks();
                this.getDevelopers();
            },
            methods: {
                async getSprints() {
                    this.sprints = (await axios.get('/api/sprints')).data.data;
                },
                async getTasks() {
                    if (this.selectedDeveloperId) {
                        let query = `?developer_id=${this.selectedDeveloperId}`;
                        this.tasks = (await axios.get(`/api/sprints/${this.activeSprintId}/tasks${query}`)).data.data;
                    } else {
                        this.tasks = (await axios.get(`/api/sprints/${this.activeSprintId}/tasks`)).data.data;
                    }
                },
                async getDevelopers() {
                    this.developers = (await axios.get('/api/developers')).data.data;
                }
            }
        }).mount('#app')
    </script>
@endpush

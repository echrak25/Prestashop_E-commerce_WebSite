{**
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License version 3.0
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * @author    PrestaShop SA and Contributors <contact@prestashop.com>
 * @copyright Since 2007 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License version 3.0
 *}
<div x-data="{
        taskCounts: window.taskCounts || [], // Assuming 'taskCounts' is defined globally via Media::addJsDef
        queueStatus: '',
        clearTasks() {
            // ask user before clearing tasks
            if (!confirm('{l s='Are you sure you want to clear the task queue?' mod='wizardai'}')) {
                return;
            }
            $.ajax({
                url: ajaxUrl,
                type: 'POST',
                data: {
                    action: 'ClearTasks',
                    securityToken: securityToken
                },
                success: (response) => {
                    $.growl.notice({
                        title: 'Task Update',
                        message: 'The task queue has been cleared.'
                    });
                    window.location.reload();
                },
                error: (error) => {
                    $.growl.error({
                        title: 'Task Error',
                        message: 'Failed to reset tasks.'
                    });
                }
            });
        },
        pauseProcess() {
            $.ajax({
                url: ajaxUrl,
                type: 'POST',
                data: {
                    action: 'StopProcess',
                    securityToken: securityToken
                },
                success: (response) => {
                    this.queueStatus = 'pause';
                    $.growl.warning({
                        title: 'Tasks Update',
                        message: 'The task queue has been paused.'
                    });
                },
                error: (error) => {
                    $.growl.error({
                        title: 'Task Error',
                        message: 'Failed to pause tasks.'
                    });
                }
            });
        },
        startProcess() {
            $.ajax({
                url: ajaxUrl,
                type: 'POST',
                data: {
                    action: 'StartProcess',
                    securityToken: securityToken
                },
                success: (response) => {
                    this.queueStatus = 'start';
                    $.growl.notice({
                        title: 'Tasks Update',
                        message: 'The task queue has been started.'
                    });
                },
                error: (error) => {
                    $.growl.error({
                        title: 'Task Error',
                        message: 'Failed to start tasks.'
                    });
                }
            });
        },
        status() {
            $.ajax({
                url: ajaxUrl,
                type: 'GET',
                data: {
                    action: 'WebhookStatus',
                    securityToken: securityToken
                },
                success: (response) => {
                    response = JSON.parse(response);
                    this.queueStatus = response.response.status;
                },
                error: (error) => {
                    $.growl.error({
                        title: 'Webhook Error',
                        message: 'Failed to get queue status.'
                    });
                }
            });
        }
    }"
    @add-to-queue.window="taskCounts.queue = $event.detail.taskCounts"
    x-init="status();"
    class="w-full bg-white border rounded-lg shadow-sm p-7 border-neutral-200/60">
    <div x-data="{ isOpenModal: false }" @close-modal.window="isOpenModal = false" class="flex items-center gap-5 mt-4 mb-10">
        <h2 class="text-4xl font-bold mt-0 mb-0">{l s='Bulk Task' mod='wizardai'} <span class="text-blue-500">{l s='Management' mod='wizardai'}</span> </h2>

        {if $is_ssl}
            <!-- Bouton pour ouvrir la modal -->
            <button @click="isOpenModal = true" type="button" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium tracking-wide text-white transition-colors duration-200 rounded-md bg-neutral-950 hover:bg-neutral-900 focus:ring-2 focus:ring-offset-2 focus:ring-neutral-900 focus:shadow-outline focus:outline-none">
            <span class="mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 15 15" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M12.555 1C10.41 1 7.534 2.471 5.602 5H4c-1.157 0-1.82.864-2.277 1.777L1.11 8H4l1.5 1.5L7 11V13.889l1.223-.612C9.136 12.821 10 12.157 10 11V9.398c2.529-1.932 4-4.809 4-6.953V1zM10 4a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm-6.5 6-.5.5c-.722.722-1 2.5-1 2.5s1.698-.198 2.5-1l.5-.5z" fill="#ffffff" opacity="1" data-original="#000000" class=""></path></g></svg>
            </span>
                {l s='Launch Bulk Generation' mod='wizardai'}
            </button>

            <div style="z-index: 9999">
                <!-- Modal -->
                <div :class="{ 'hidden': !isOpenModal }" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-50 hidden" x-cloak>
                    {include file='./bulk.modal.tpl'}
                </div>
            </div>
        {else}
            <p class="text-red-400 font-bold mb-0"> <i class="material-icons wizardai-icons-round wizardai-icon-cancel text-center" style="font-size: 1rem;">&#10006;</i> {l s='You need to enable SSL to launch bulk generation' mod='wizardai'}</p>
        {/if}

        {if $credits < 1 &&  $taskCounts > 0}
            <div class="flex items-center" style="max-width: 550px; width: 100%">
                <i class="material-icons wizardai-icons-round wizardai-icon-cancel text-center" style="font-size: 1rem;">&#10006;</i>
                <p class="text-red-400 font-bold mb-0"> {l s='Unfortunately, you have run out of credits.  Wait until next month or contact us on ' mod='wizardai'} <a href="https://addons.prestashop.com/en/contact-us?id_product=90521" target="_blank">{l s='Prestashop Addons' mod='wizardai'}</a> {l s='to obtain more credits and continue using our services.' mod='wizardai'}</p>
            </div>
        {/if}
    </div>
    <hr>
    <div class="queue-overview">
        <div class="flex items-center gap-5 mt-4 mb-4">
            <h3 class="text-2xl font-bold mt-0 mb-0 bg-white border-0 m-0">{l s='Queue Overview' mod='wizardai'}</h3>
            <button type="button" @click="clearTasks" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium tracking-wide text-white transition-colors duration-200 bg-red-600 rounded-md hover:bg-red-700 focus:ring-2 focus:ring-offset-2 focus:ring-red-700 focus:shadow-outline focus:outline-none">
                {l s='Clear' mod='wizardai'}
            </button>
            <div class="inline-flex rounded-md shadow-sm" role="group">
                <button @click="pauseProcess" type="button" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium tracking-wide transition-colors duration-200 bg-white border rounded-s-lg text-neutral-500 hover:text-neutral-700 border-neutral-200/70 hover:bg-neutral-100 active:bg-white focus:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-200/60 focus:shadow-outline">
                    <i class="material-icons">pause</i>
                </button>
                <button @click="startProcess" type="button" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium tracking-wide text-white transition-colors duration-200 bg-green-600 rounded-e-lg hover:bg-green-700 focus:ring-2 focus:ring-offset-2 focus:ring-green-700 focus:shadow-outline focus:outline-none">
                    <i class="material-icons">play_arrow</i>
                </button>
            </div>
            <div class="inline-flex " role="group">
                <p class="m-0">{l s='Your queue is currently in :' mod='wizardai'} <span class="font-bold"  x-text="queueStatus.toUpperCase()" :class="queueStatus === 'pause' ? 'text-red-500' : (queueStatus === 'start' ? 'text-green-500' : '')"></span></p>
            </div>
        </div>
        <div class="flex flex-col">
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full">
                    <div class="overflow-hidden border rounded-lg">
                        <table class="min-w-full divide-y divide-neutral-200">
                            <thead class="bg-neutral-50">
                            <tr class="text-neutral-500">
                                <th class="px-5 py-3 text-xs font-medium text-center uppercase">{l s='Task in Queue' mod='wizardai'}</th>
                                <th class="px-5 py-3 text-xs font-medium text-center uppercase">{l s='Ongoing Tasks' mod='wizardai'}</th>
                                <th class="px-5 py-3 text-xs font-medium text-center uppercase">{l s='Completed Tasks' mod='wizardai'}</th>
                                <th class="px-5 py-3 text-xs font-medium text-center uppercase">{l s='Failed Tasks ' mod='wizardai'}</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-neutral-200">
                            <tr class="text-neutral-800">
                                <td class="px-5 py-4 text-center text-sm border-2 font-medium whitespace-nowrap" x-text="taskCounts.queue">0</td>
                                <td class="px-5 py-4 text-center text-sm border-2 whitespace-nowrap font-bold" x-text="taskCounts.ongoing">0</td>
                                <td class="px-5 py-4 text-center text-sm border-2 whitespace-nowrap text-green-600 font-bold" x-text="taskCounts.completed">0</td>
                                <td class="px-5 py-4 text-center text-sm border-2 whitespace-nowrap text-red-600 font-bold" x-text="taskCounts.failed">0</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div
        x-data="{
    tabSelected: 1,
    tabId: $id('tabs'),
    tabButtonClicked(tabButton){
        this.tabSelected = tabButton.id.replace(this.tabId + '-', '');
        this.tabRepositionMarker(tabButton);
    },
    tabRepositionMarker(tabButton){
        this.$refs.tabMarker.style.width=tabButton.offsetWidth + 'px';
        this.$refs.tabMarker.style.height=tabButton.offsetHeight + 'px';
        this.$refs.tabMarker.style.left=tabButton.offsetLeft + 'px';
    },
    tabContentActive(tabContent){
        return this.tabSelected == tabContent.id.replace(this.tabId + '-content-', '');
    },
    ongoingTasks: window.ongoingTasks || [], // Assuming 'ongoingTasks' is defined globally via Media::addJsDef
    completedTasks: window.completedTasks || [],
    failedTasks: window.failedTasks || [],
    resetTask(taskId) {
        let taskToReset = this.failedTasks.find(task => task.id === taskId);
        let sourceArray = 'failedTasks';

        if (!taskToReset) {
            taskToReset = this.completedTasks.find(task => task.id === taskId);
            sourceArray = 'completedTasks';
        }

        if (!taskToReset) {
            $.growl.error({ title: 'Task Error', message: 'Task not found.' });
            return;
        }

        $.ajax({
            url: ajaxUrl,
            type: 'POST',
            data: {
                action: 'RelaunchTask',
                securityToken: securityToken,
                taskId: taskId,
            },
            success: (response) => {
                // Move task to ongoingTasks and remove from source array
                this.ongoingTasks.push(taskToReset);
                this[sourceArray] = this[sourceArray].filter(task => task.id !== taskId);

                // Update task counts
                this.taskCounts.ongoing++;
                this.taskCounts[sourceArray === 'failedTasks' ? 'failed' : 'completed']--;

                $.growl.notice({
                    title: 'Task Update',
                    message: 'The task will be reprocessed.'
                });
            },
            error: (error) => {
                $.growl.error({
                    title: 'Task Error',
                    message: 'Failed to reset the task.'
                });
            }
        });
    }
}"

        x-init="tabRepositionMarker($refs.tabButtons.firstElementChild);" class="relative w-full mt-2">

    <div x-ref="tabButtons" class="relative inline-grid items-center justify-center w-full h-10 grid-cols-3 p-1 text-gray-500 bg-gray-100 rounded-lg select-none shadow-sm">
        <button :id="$id(tabId)" @click="tabButtonClicked($el);" type="button" class="relative z-20 inline-flex items-center justify-center w-full h-8 px-3 text-sm font-medium transition-all rounded-md cursor-pointer whitespace-nowrap">{l s='ONGOING TASKS' mod='wizardai'}</button>
        <button :id="$id(tabId)" @click="tabButtonClicked($el);" type="button" class="relative z-20 inline-flex items-center justify-center w-full h-8 px-3 text-sm font-medium transition-all rounded-md cursor-pointer whitespace-nowrap">{l s='COMPLETED TASKS' mod='wizardai'}</button>
        <button :id="$id(tabId)" @click="tabButtonClicked($el);" type="button" class="relative z-20 inline-flex items-center justify-center w-full h-8 px-3 text-sm font-medium transition-all rounded-md cursor-pointer whitespace-nowrap">{l s='FAILED TASKS' mod='wizardai'}</button>
        <div x-ref="tabMarker" class="absolute z-10 w-1/3 h-full duration-300 ease-out" x-cloak><div class="w-full h-full bg-white rounded-md shadow-sm"></div></div>
    </div>
    <div class="relative w-full mt-2 content">
        <div :id="$id(tabId + '-content')" x-show="tabContentActive($el)" class="relative">
            <div class="w-full bg-white border rounded-lg shadow-sm p-7 border-neutral-200/60">
                <div class="flex items-center gap-5 mt-2 mb-2">
                    <h3 class="text-2xl font-bold m-0 border-0 bg-white">{l s='Ongoing' mod='wizardai'} <span class="text-blue-500">{l s='Tasks' mod='wizardai'}</span> <small>(<span x-text="taskCounts.ongoing"></span>)</small> </h3>
                </div>
                <hr>
                <div class="table-overview">
                    <div class="flex flex-col">
                        <div class="overflow-x-auto">
                            <div class="inline-block min-w-full">
                                <div class="overflow-hidden border rounded-lg">
                                    <table class="min-w-full divide-y divide-neutral-200">
                                        <thead class="bg-neutral-50">
                                        <tr class="text-neutral-500">
                                            <th class="px-5 py-3 text-xs font-medium text-left uppercase">{l s='Task' mod='wizardai'}</th>
                                            <th class="px-5 py-3 text-xs font-medium text-left uppercase">{l s='Target' mod='wizardai'}</th>
                                            <th class="px-5 py-3 text-xs font-medium text-left uppercase">{l s='Entity' mod='wizardai'}</th>
                                            <th class="px-5 py-3 text-xs font-medium text-left uppercase">{l s='Shop' mod='wizardai'}</th>
                                            <th class="px-5 py-3 text-xs font-medium text-right uppercase"></th>
                                        </tr>
                                        </thead>
                                        <tbody class="divide-y divide-neutral-200">
                                        <template x-for="task in ongoingTasks" :key="task.id">
                                            <tr class="text-neutral-800">
                                                <td class="px-5 py-4 text-sm font-medium whitespace-nowrap" x-text="task.task"></td>
                                                <td class="px-5 py-4 text-sm whitespace-nowrap" x-text="task.target"></td>
                                                <td class="px-5 py-4 text-sm whitespace-nowrap" x-text="task.entity_name"></td>
                                                <td class="px-5 py-4 text-sm whitespace-nowrap" x-text="task.shop_name"></td>
                                                <td class="px-5 py-4 text-sm font-medium text-right whitespace-nowrap"></td>
                                            </tr>
                                        </template>
                                        <tr x-show="ongoingTasks.length === 0">
                                            <td colspan="5" class="px-5 py-4 text-center text-sm">{l s='No tasks' mod='wizardai'}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div :id="$id(tabId + '-content')" x-show="tabContentActive($el)" class="relative" x-cloak>
            <div class="w-full bg-white border rounded-lg shadow-sm p-7 border-neutral-200/60">
                <div class="flex items-center gap-5 mt-2 mb-2">
                    <h3 class="text-2xl font-bold m-0 border-0 bg-white">{l s='Completed' mod='wizardai'} <span class="text-green-600">{l s='Tasks' mod='wizardai'}</span> <small>(<span x-text="taskCounts.completed"></span>)</small> </h3>
                </div>
                <hr>
                <div class="table-overview">
                    <div class="flex flex-col">
                        <div class="overflow-x-auto">
                            <div class="inline-block min-w-full">
                                <div class="overflow-hidden border rounded-lg">
                                    <table class="min-w-full divide-y divide-neutral-200">
                                        <thead class="bg-neutral-50">
                                        <tr class="text-neutral-500">
                                            <th class="px-5 py-3 text-xs font-medium text-left uppercase">{l s='Task' mod='wizardai'}</th>
                                            <th class="px-5 py-3 text-xs font-medium text-left uppercase">{l s='Target' mod='wizardai'}</th>
                                            <th class="px-5 py-3 text-xs font-medium text-left uppercase">{l s='Entity' mod='wizardai'}</th>
                                            <th class="px-5 py-3 text-xs font-medium text-left uppercase">{l s='Shop' mod='wizardai'}</th>
                                            <th class="px-5 py-3 text-xs font-medium text-right uppercase">{l s='Action' mod='wizardai'}</th>
                                        </tr>
                                        </thead>
                                        <tbody class="divide-y divide-neutral-200">
                                        <template x-for="task in completedTasks" :key="task.id">
                                            <tr class="text-neutral-800">
                                                <td class="px-5 py-4 text-sm font-medium whitespace-nowrap" x-text="task.task"></td>
                                                <td class="px-5 py-4 text-sm whitespace-nowrap" x-text="task.target"></td>
                                                <td class="px-5 py-4 text-sm whitespace-nowrap" x-text="task.entity_name"></td>
                                                <td class="px-5 py-4 text-sm whitespace-nowrap" x-text="task.shop_name"></td>
                                                <td class="px-5 py-4 text-sm font-medium text-right whitespace-nowrap">
                                                    <button type="button" @click="resetTask(task.id)" class="inline-flex items-center justify-center px-2 py-1 text-xs font-medium tracking-wide text-white transition-colors duration-200 rounded-md bg-neutral-950 hover:bg-neutral-900 focus:ring-2 focus:ring-offset-2 focus:ring-neutral-900 focus:shadow-outline focus:outline-none">
                                                        <i class="material-icons text-sm mr-1">sync</i> {l s='Relaunch' mod='wizardai'}
                                                    </button>
                                                </td>
                                            </tr>
                                        </template>
                                        <tr x-show="completedTasks.length === 0">
                                            <td colspan="5" class="px-5 py-4 text-center text-sm">{l s='No tasks' mod='wizardai'}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div :id="$id(tabId + '-content')" x-show="tabContentActive($el)" class="relative" x-cloak>
            <div class="w-full bg-white border rounded-lg shadow-sm p-7 border-neutral-200/60">
                <div class="flex items-center gap-5 mt-2 mb-2">
                    <h3 class="text-2xl font-bold m-0 border-0 bg-white">{l s='Failed' mod='wizardai'} <span class="text-red-600">{l s='Tasks' mod='wizardai'}</span> <small>(<span x-text="taskCounts.failed"></span>)</small> </h3>
                </div>
                <hr>
                <div class="table-overview">
                    <div class="flex flex-col">
                        <div class="overflow-x-auto">
                            <div class="inline-block min-w-full">
                                <div class="overflow-hidden border rounded-lg">
                                    <table class="min-w-full divide-y divide-neutral-200">
                                        <thead class="bg-neutral-50">
                                        <tr class="text-neutral-500">
                                            <th class="px-5 py-3 text-xs font-medium text-left uppercase">{l s='Task' mod='wizardai'}</th>
                                            <th class="px-5 py-3 text-xs font-medium text-left uppercase">{l s='Target' mod='wizardai'}</th>
                                            <th class="px-5 py-3 text-xs font-medium text-left uppercase">{l s='Entity' mod='wizardai'}</th>
                                            <th class="px-5 py-3 text-xs font-medium text-left uppercase">{l s='Shop' mod='wizardai'}</th>
                                            <th class="px-5 py-3 text-xs font-medium text-right uppercase">{l s='Action' mod='wizardai'}</th>
                                        </tr>
                                        </thead>
                                        <tbody class="divide-y divide-neutral-200">
                                        <template x-for="task in failedTasks" :key="task.id">
                                            <tr class="text-neutral-800">
                                                <td class="px-5 py-4 text-sm font-medium whitespace-nowrap" x-text="task.task"></td>
                                                <td class="px-5 py-4 text-sm whitespace-nowrap" x-text="task.target"></td>
                                                <td class="px-5 py-4 text-sm whitespace-nowrap" x-text="task.entity_name"></td>
                                                <td class="px-5 py-4 text-sm whitespace-nowrap" x-text="task.shop_name"></td>
                                                <td class="px-5 py-4 text-sm font-medium text-right whitespace-nowrap">
                                                    <button type="button" @click="resetTask(task.id)" class="inline-flex items-center justify-center px-2 py-1 text-xs font-medium tracking-wide text-white transition-colors duration-200 rounded-md bg-neutral-950 hover:bg-neutral-900 focus:ring-2 focus:ring-offset-2 focus:ring-neutral-900 focus:shadow-outline focus:outline-none">
                                                        <i class="material-icons text-sm mr-1">sync</i> {l s='Relaunch' mod='wizardai'}
                                                    </button>
                                                </td>
                                            </tr>
                                        </template>
                                        <tr x-show="failedTasks.length === 0">
                                            <td colspan="5" class="px-5 py-4 text-center text-sm">{l s='No tasks' mod='wizardai'}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

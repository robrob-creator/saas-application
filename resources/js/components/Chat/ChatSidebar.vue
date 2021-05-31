<template>
    <div class="py-2 px-3">
        <!--This is the sidebar -->
           <div class="mt-4 rounded-full">
                <div class="relative mx-4 lg:mx-0 rounded-full">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24  " fill="none">
                    <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </span>

            <input class="form-input w-32 sm:w-64 rounded-md pl-10 pr-4 focus:border-indigo-600 rounded-full" type="text" placeholder="Search">
        </div>
           </div>
        <!--This is the conversations -->
        <div class="mt-8">
            <div class="flex justify-between items-center"> 
              
                <label class="font-bold tracking-wider text-xs uppercase mb-2">Conversation</label>
                <div class="spin">
                <button class="hover:bg-gray-200 p-1 rounded-md cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                </button>    
                </div>              
            </div>
                    <p class="italic text-gray-700 text-sm" v-if="! chatRooms.length">
                         Click the button to create a conversation.
                         
                    </p>
            <div class="w-full" v-else>
                <div class="w-full" v-for="(room, index) in chatRooms" :key="index">
                    <div @click.prevent="select(room.id)" :class="room.id === selected ? 'bg-gray-100 rounded text-indigo-800' : ''" class="flex w-full items-center justify-between">
                        <div class="inline-flex items-center leading-none">
                            <span class="h-2 w-2 rounded-full bg-green-700 mr-1.5 inline-block"></span>
                            {{room.name}}
                        </div>
                        <div class="flex-shrink-0 inline-flex flex-grow-0">
                            <div class="flex-shrink-0 flex-grow-0">
                                <div class="relative inline-block text-left">
                                    <div>
                                        <button class="hover:bg-gray-200 p-1 rounded-md cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                            </svg>
                                        </button>
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
<script>
import { EventBus } from '../../EventBus';
import 'regenerator-runtime/runtime';
import axios from 'axios';
export default {
    data(){
        return{
            chatRooms:[],
            selected:null,
            loading:true

        }
    },
      async mounted(){
          try {
              const { data } = await axios.get('/chat/all-rooms');
               this.chatRooms = data;
               this.loading = false;
              
          } catch {
              
          }       
    },
    methods:{
        select(id){
            this.selected = id;
            EventBus.$emit('chatroom-selected',id);
        }
    }
    
}
</script>
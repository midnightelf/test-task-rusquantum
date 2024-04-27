<script setup>
import { ref } from "vue";
import { collectFormData } from "@/services/functions/form";
import storages from "@/services/storages.js";
import TicketRepository from "@/services/repositories/TicketRepository";
import BaseHeading from "@/components/elements/BaseHeading.vue";
import BaseButton from "@/components/ui/BaseButton.vue";
import BaseSelect from "@/components/ui/BaseSelect.vue";
import FormInput from "@/components/aggregates/forms/FormInput.vue";
import FormTextarea from "@/components/aggregates/forms/FormTextarea.vue";
import Ticket from "@/services/classes/Ticket";

const storeForm = ref(null)

const submitStoreForm = async (event) => {
  const formData = collectFormData(event.srcElement.form)

  const response = await TicketRepository.store(formData)

  // WARNING: DIRTY ZONE :WARGNING
  document.getElementById('dirty').innerHTML = response instanceof Ticket ? response.toString() : response.formatted()
  setTimeout(() => { document.getElementById('dirty').innerHTML = '' }, 5000)
  // WARNING: DIRTY ZONE :WARGNING
}
</script>

<template>
  <div class="mx-auto max-w-[1920px] px-4 md:px-8 2xl:px-16">
    <div class="md:w-full lg:w-3/5 2xl:w-4/6 flex h-full ltr:md:ml-7 rtl:md:mr-7 flex-col ltr:lg:pl-7 rtl:lg:pr-7">
      <div class="flex pb-7 md:pb-9 mt-7 md:-mt-1.5">
        <BaseHeading>Ticket</BaseHeading>
      </div>
      <form class="w-full mx-auto flex flex-col justify-center " ref="storeForm" noValidate>
        <div class="flex flex-col space-y-5">
          <div class="flex flex-col md:flex-row space-y-5 md:space-y-0 gap-4">
            <FormInput id="username" name="username" type="text" label="Your name" placeholder="Enter your name"
              :required="true" />
            <FormInput class="ltr:md:ml-2.5 rtl:md:mr-2.5 ltr:lg:ml-5 rtl:lg:mr-5 mt-2 md:mt-0" id="phone" name="phone"
              type="phone" label="Your phone" placeholder="Enter your phone" :required="true" />
          </div>
          <div class="relative mb-4">
            <FormTextarea id="message" name="message" :rows="4" label="Message" placeholder="Enter your message"
              :required="true" />
          </div>
          <div>
            <BaseSelect name="connection" :options="storages" />
          </div>
          <div class="relative">
            <BaseButton text="Send" @click.prevent="submitStoreForm" />
          </div>
          <div id="dirty"></div>
        </div>
      </form>
    </div>
  </div>
</template>
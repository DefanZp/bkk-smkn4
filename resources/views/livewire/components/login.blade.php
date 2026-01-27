<div>
        <h2 class="heading-24s text-bkkNeutral-900 mb-6">Login Form</h2> 
        <form 
            class="flex flex-col gap-4"
            wire:submit.prevent="login">
            <input class="" type="text" wire:model="nisn" placeholder="NISN" />
            <input class="" type="password" wire:model="password" placeholder="Password"/>
            <button type="submit">
                Submit
            </button>
        </form>
</div>

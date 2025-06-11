@props(['disabled' => false, 'type' => 'text'])

@php
    $isPassword = $type === 'password';
@endphp

<div class="relative">
    <input 
        @disabled($disabled) 
        type="{{ $type }}"
        {{ $attributes->merge(['class' => 'text-gray-900 border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm w-full' . ($isPassword ? ' pr-10' : '')]) }}
    >
    @if($isPassword)
        <button 
            type="button"
            class="absolute inset-y-0 right-0 flex items-center pr-3 opacity-0 focus-within:opacity-100 peer-focus:opacity-100"
            onclick="togglePasswordVisibility(this)"
            tabindex="-1"
        >
            <svg class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
        </button>
    @endif
</div>

@if($isPassword)
<script>
document.addEventListener('DOMContentLoaded', function() {
    const passwordInputs = document.querySelectorAll('input[type="password"]');
    
    passwordInputs.forEach(input => {
        const button = input.parentElement.querySelector('button');
        if (button) {
            // Initially hide the button
            button.style.opacity = '0';
            
            // Show button when input is focused
            input.addEventListener('focus', () => {
                button.style.opacity = '1';
            });
            
            // Hide button when input loses focus
            input.addEventListener('blur', (e) => {
                // Don't hide if the button was clicked
                if (!e.relatedTarget || e.relatedTarget !== button) {
                    button.style.opacity = '0';
                }
            });
        }
    });
});

function togglePasswordVisibility(button) {
    const input = button.parentElement.querySelector('input');
    const type = input.type === 'password' ? 'text' : 'password';
    input.type = type;
    
    // Update the icon
    const svg = button.querySelector('svg');
    if (type === 'password') {
        svg.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
        `;
    } else {
        svg.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
        `;
    }
}
</script>
@endif

<div>
<a {{$attributes}} aria-current="page" class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}"> {{$slot}}</a>
</div>
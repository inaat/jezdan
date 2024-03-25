<li class="dropdown-submenu {{ $item->hasActiveOnChild() ? 'active' : '' }}">
	<a tabindex="-1" href="#">{{ $child->title }}</a>
	<ul class="dropdown-menu">
		@foreach ($child->childs as $item)
			@if ($item->hasChilds())
				@include('tenant.menus::child.dropdown', ['child' => $item])
			@else
				@include('tenant.menus::child.item', compact('item'))
			@endif
		@endforeach
	</ul>
</li>

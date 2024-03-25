@foreach ($items as $item)
	@if ($item->hasChilds())
		@include('tenant.menus::item.dropdown', compact('item'))
	@else
		@include('tenant.menus::item.item', compact('item'))
	@endif
@endforeach

@if($order->status=='unpaid')
{{ 'bg-warning' }}
@elseif($order->status=='waiting')
{{ 'bg-secondary' }}
@elseif($order->status=='paid')
{{ 'bg-info' }}
@elseif($order->status=='delivery')
{{ 'bg-primary' }}
@elseif($order->status=='delivered')
{{ 'bg-success' }}
@elseif($order->status=='cancel')
{{ 'bg-danger' }}
@endif
{{-- Determinar el valor recaudado hoy--}}
@if(isset($today_sale))
    <li class="sparks-info">
        <h5> Recaudado Hoy <span class="txt-color-blue">${{ (is_numeric($today_sale) ? $today_sale : '0.00') }}</span></h5>
    </li>
@endif
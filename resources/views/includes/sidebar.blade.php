<ul>
	<li><a href="/customer"><i class="fa fa-users"></i> dashboard</a></li>
	@can('Customers')
	<li><a href="/customer"><i class="fa fa-users"></i> Customers</a></li>
	@endcan

	@can('Consumption')
	<li><a href="/consumption"><i class="fa fa-tachometer-alt"></i>  Consumption</a></li>
	@endcan

	@can('Bills')
	<li><a href="/bill"><i class="fa fa-file-invoice"></i>  Bills</a></li>
	@endcan

	@can('Payments')
	<li><a href="/payment"><i class="fa fa-receipt"></i>  Payments</a></li>
	@endcan

	@can('Tarrifs')
	<li><a href="/tarrif"><i class="fa fa-chart-line"></i>  Tarrifs</a></li>
	@endcan

	
	<li><a href="/role"><i class="fa fa-user-cog"></i>  Roles</a></li>
	

	@can('Users')	
	<li><a href="/user"><i class="fa fa-user"></i> Users</a></li>
		@endcan
</ul>

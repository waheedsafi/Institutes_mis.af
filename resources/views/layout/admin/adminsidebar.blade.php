
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
	<!-- Add icons to the links using the .nav-icon class
		with font-awesome or any other icon font library -->
	<li class="nav-item ">
		<a href="{{route('admin.dashboard')}}" class="nav-link">
			<i class="nav-icon fas fa-tachometer-alt "></i>
			<p>Dashboard</p>
		</a>																
	</li>
	<li class="nav-item">
		<a href="{{route('admin.institute')}}" class="nav-link">
			<i class="nav-icon fas fa-university"></i>
			<p>Institutes</p>
		</a>
	</li>
	<li class="nav-item">
		<a href="{{route('admin.department')}}" class="nav-link">
			<!-- <i class="nav-icon fas fa-tag"></i> -->
			<i class="fas fa-building nav-icon"></i>
			<p>Department</p>
		</a>
	</li>	
	<li class="nav-item">
		<a href="{{ route('admin.users')}}" class="nav-link">
			<i class="nav-icon fas fa-user-alt"></i>
			<p>User</p>
		</a>
		
	</li>
	<li class="nav-item">
		<a href="brands.html" class="nav-link">
			<i class="nav-icon fas fa-lock"></i>
			
			<p>Role</p>
		</a>
	</li>
	<li class="nav-item">
		<a href="{{route('admin.permission')}}" class="nav-link">
			<i class="nav-icon fas fa-user-lock"></i>
			<p>Permission</p>
		</a>
	</li>
	
							
	<li class="nav-item">
		<a href="orders.html" class="nav-link">
			<i class="nav-icon fas fa-book-open"></i>
			<p>Subject</p>
		</a>
	</li>
				
</ul>
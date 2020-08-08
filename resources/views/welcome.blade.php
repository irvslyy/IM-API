@extends('api_docs.home')

@section('content')

	<!-- Bottom tabs -->
	<div class="card">
		<div class="card-header bg-white pb-0 pt-sm-0 pr-sm-0 header-elements-sm-inline">
			<h6 class="card-title">API DOCS</h6>
			<div class="header-elements">
				<ul class="nav nav-tabs nav-tabs-bottom card-header-tabs mx-0">
					<li class="nav-item">
						<a href="#card-bottom-tab1" class="nav-link active" data-toggle="tab">
							<i class="icon-screen-full mr-2"></i>
							Home
						</a>
					</li>
					<li class="nav-item">
						<a href="#card-bottom-tab2" class="nav-link" data-toggle="tab">
							<i class="icon-stats-bars mr-2"></i>
							Stats
						</a>
					</li>
				</ul>
			</div>
		</div>
		
		<div class="card-body tab-content">
			<div class="tab-pane fade show active" id="card-bottom-tab1">
				
			<h3>Login users</h3>
			<pre class="language-css mb-3"><code>/* JSON  */

"status": 200,
"data": {
	...
}
</code></pre>


			</div>

			<div class="tab-pane fade" id="card-bottom-tab2">
				//
			</div>
		</div>
	</div>
	<!-- /bottom tabs -->

@endsection

@section('script')
<script>
	// var test = prompt("username");
	// if (test == 'root') {
	// 	console.log("y, ur root");
	// } else {
	// 	window.location.href = "http://mercusuar.uzone.id";
	// }
</script>
@endsection
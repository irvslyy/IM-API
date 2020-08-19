@extends('api_docs.home')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                <!-- SATU PARAGRAF API -->                
                <div class="row">
                    <div class="col-md-6">
                        <h1>GET</h1>
                        <h5>Login users</h5>
                        <pre class="language-css mb-3"><code>http://domain.com/api/login/user </code></pre>
                        <hr>

                        <h5>Register users</h5>
                        <pre class="language-css mb-3"><code>http://domain.com/api/register/user </code></pre>
                        <hr>
   
                        <h5>History approval</h5>
                        <pre class="language-css mb-3"><code>http://domain.com/api/history/approval </code></pre>
                        <hr>

                        <h5>History approval/request code</h5>
                        <pre class="language-css mb-3"><code>http://domain.com/api/history/approval/{request_code} </code></pre>
                        <hr>

                        <h5>Hierarky users</h5>
                        <pre class="language-css mb-3"><code>http://domain.com/api/heirarky/{id} </code></pre>
                        <hr>

                        <h5>goodrequestform users list</h5>
                        <pre class="language-css mb-3"><code>http://domain.com/api/grf/user/list/{id} </code></pre>
                        <hr>

                        <h5>stock</h5>
                        <pre class="language-css mb-3"><code>http://domain.com/api/stock </code></pre>
                        <hr>
                         
                        <h5>stock warehouse</h5>
                        <pre class="language-css mb-3"><code>http://domain.com/api/stock?wh_code={wh_code} </code></pre>
                        <hr>

                        <h5>get GRF/employee number </h5>
                        <pre class="language-css mb-3"><code>http://domain.com/api/goodreq/employee/{emp} </code></pre>
                        <hr>
                        
                        <h5>get GRF All </h5>
                        <pre class="language-css mb-3"><code>http://domain.com/api/goodrequest </code></pre>
                        <hr>

                        <h5>grf approval list</h5>
                        <pre class="language-css mb-3"><code>http://domain.com/api/grf/approval/list </code></pre>
                        <hr>
                        
                        <h5>grf approval list / warehouse</h5>
                        <pre class="language-css mb-3"><code>http://domain.com/api/grf/approval/list/{wh_code} </code></pre>
                        <hr>
                        
                        <h5>grf approval list disaster</h5>
                        <pre class="language-css mb-3"><code>http://domain.com/api/grf/approval/list/disaster</code></pre>
                        <hr>
                        
                        <h5>grf approval listing</h5>
                        <pre class="language-css mb-3"><code>http://domain.com/api/grf/approval/listing/{request_code} </code></pre>
                        <hr>

                        <h5>get all segment </h5>
                        <pre class="language-css mb-3"><code>http://domain.com/api/segment </code></pre>
                        <hr>

                        <h5>get warehouse/regional</h5>
                        <pre class="language-css mb-3"><code>http://domain.com/api/wh/{regional} </code></pre>
                        <hr>

                        <h5>get approval supervisor</h5>
                        <pre class="language-css mb-3"><code>http://domain.com/api/approve/spv/{id} </code></pre>
                        <hr>

                        <h5>get approval manager</h5>
                        <pre class="language-css mb-3"><code>http://domain.com/api/approve/mng/{id} </code></pre>
                        <hr>

                        <h5>manager get all team leader</h5>
                        <pre class="language-css mb-3"><code>http://domain.com/api/manager/{id} </code></pre>
                        <hr>

                        <h5>usage balance all warehouse</h5>
                        <pre class="language-css mb-3"><code>http://domain.com/api/usage </code></pre>
                        <hr>

                        <h5>usage balance per warehouse</h5>
                        <pre class="language-css mb-3"><code>http://domain.com/api/usagewarehouse/{segment} </code></pre>
                        <hr>

                        <h5>get users disaster</h5>
                        <pre class="language-css mb-3"><code>http://domain.com/api/userdisaster </code></pre>
                        <hr>


                    </div>
                    <div class="col-md-6">
                        <h1>POST</h1>
                        <h5>form request</h5>
                        <pre class="language-css mb-3"><code>http://domain.com/api/form/req </code></pre>
                        <hr>

                        <h5>goodrequest update field status in tbl GRF</h5>
                        <pre class="language-css mb-3"><code>http://domain.com/api/goodrequest/update/status </code></pre>
                        <hr>

                        <h5>request status supervisor (field status approval supervisor)</h5>
                        <pre class="language-css mb-3"><code>http://domain.com/api/request/status/supervisor/{code} </code></pre>
                        <hr>

                        <h5>request status manager (field status approval manager)</h5>
                        <pre class="language-css mb-3"><code>http://domain.com/api/request/status/mng/{code} </code></pre>
                        <hr>

                        <h5>good request form store</h5>
                        <pre class="language-css mb-3"><code>http://domain.com/api/goodReq </code></pre>
                        <hr>

                        <h5>goodreq update status in tbl GRF</h5>
                        <pre class="language-css mb-3"><code>http://domain.com/api/goodReq/update/{id} </code></pre>
                        <hr>

                        <h5>request status admin</h5>
                        <pre class="language-css mb-3"><code>http://domain.com/api/request/status/admin </code></pre>
                        <hr>

                        <h5>update grf status</h5>
                        <pre class="language-css mb-3"><code>http://domain.com/api/grf/status/mng/{id} </code></pre>
                        <hr>

                        <h5>exam</h5>
                        <pre class="language-css mb-3"><code>http://domain.com/api/exam </code></pre>
                        <hr>

                        <h5>exam</h5>
                        <pre class="language-css mb-3"><code>http://domain.com/api/exam </code></pre>
                        <hr>

                        <h5>exam</h5>
                        <pre class="language-css mb-3"><code>http://domain.com/api/exam </code></pre>
                        <hr>

                        <h5>exam</h5>
                        <pre class="language-css mb-3"><code>http://domain.com/api/exam </code></pre>
                        <hr>

                    </div>
                </div>
                <br>
                <!-- SATU PARAGRAF API -->
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
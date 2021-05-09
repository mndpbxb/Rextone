 @extends('layouts.admin.roxtone')

 @section('admin_content')
     <div class="container-fluid">
         <h1 class="mt-4">Users Table</h1>
         <div class="card mb-4">
             <div class="card-body">
                 Table below shows the data and details of all the registered customers..
             </div>
         </div>
         <div class="card mb-4">
             <div class="card-header">
                 <i class="fas fa-table mr-1"></i>
                 Users List Table
             </div>
             <div class="card-body">
                 <div class="table-responsive">
                     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                         <thead>
                             <tr>
                                 <th>Name</th>
                                 <th>E-mail</th>
                                 <th>Address</th>
                                 <th>Phone</th>
                                 <th>Date of Birth</th>
                                 <th>Actions</th>
                             </tr>
                         </thead>
                         <tfoot>
                             <tr>
                                 <th>Name</th>
                                 <th>E-mail</th>
                                 <th>Address</th>
                                 <th>Phone</th>
                                 <th>Date of Birth</th>
                                 <th>Actions</th>
                             </tr>
                         </tfoot>

                         <tbody>
                             @foreach ($users as $user)
                                 <tr>
                                     <td>{{ $user->name }}</td>
                                     <td>{{ $user->email }}</td>
                                     <td>{{ $user->address }}</td>
                                     <td>{{ $user->phone }}</td>
                                     <td>{{ $user->date_of_birth }}</td>
                                     <td>
                                         <a href="admin/update/{{ $user->id }}">
                                             <i class="fas fa-edit"></i>
                                         </a>
                                         <a href="admin/delete/{{ $user->id }}">
                                             <i class="fas fa-trash-alt"></i>
                                         </a>
                                     </td>
                                 </tr>
                             @endforeach
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div>
 @endsection

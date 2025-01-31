 <div class="card">
     <div class="card-body">
         <div class="table-responsive">
             <table class="table table-hover">
                 <thead>
                     <tr>
                         <th>Receipt No.</th>
                         <th>Student Name</th>
                         <th>Class</th>
                         <th>Fee Type</th>
                         <th>Amount</th>
                         <th>Due Date</th>
                         <th>Status</th>
                         <th>Actions</th>
                     </tr>
                 </thead>
                 <tbody>
                     <tr>
                         <td>FEE001</td>
                         <td>John Doe</td>
                         <td>X-A</td>
                         <td>Tuition Fee</td>
                         <td>$1,200</td>
                         <td>2024-03-15</td>
                         <td><span class="badge bg-success">Paid</span></td>
                         <td>
                             <button class="btn btn-sm btn-info me-2" title="View Receipt">
                                 <i class="bi bi-file-text"></i>
                             </button>
                             <button class="btn btn-sm btn-primary me-2" title="Edit">
                                 <i class="bi bi-pencil"></i>
                             </button>
                             <button class="btn btn-sm btn-danger" title="Delete">
                                 <i class="bi bi-trash"></i>
                             </button>
                         </td>
                     </tr>
                     <tr>
                         <td>FEE002</td>
                         <td>Jane Smith</td>
                         <td>X-B</td>
                         <td>Library Fee</td>
                         <td>$150</td>
                         <td>2024-03-20</td>
                         <td><span class="badge bg-warning">Pending</span></td>
                         <td>
                             <button class="btn btn-sm btn-info me-2" title="View Receipt">
                                 <i class="bi bi-file-text"></i>
                             </button>
                             <button class="btn btn-sm btn-primary me-2" title="Edit">
                                 <i class="bi bi-pencil"></i>
                             </button>
                             <button class="btn btn-sm btn-danger" title="Delete">
                                 <i class="bi bi-trash"></i>
                             </button>
                         </td>
                     </tr>
                     <tr>
                         <td>FEE003</td>
                         <td>Mike Johnson</td>
                         <td>IX-A</td>
                         <td>Lab Fee</td>
                         <td>$300</td>
                         <td>2024-02-28</td>
                         <td><span class="badge bg-danger">Overdue</span></td>
                         <td>
                             <button class="btn btn-sm btn-info me-2" title="View Receipt">
                                 <i class="bi bi-file-text"></i>
                             </button>
                             <button class="btn btn-sm btn-primary me-2" title="Edit">
                                 <i class="bi bi-pencil"></i>
                             </button>
                             <button class="btn btn-sm btn-danger" title="Delete">
                                 <i class="bi bi-trash"></i>
                             </button>
                         </td>
                     </tr>
                 </tbody>
             </table>
         </div>

         <!-- Pagination -->
         <nav class="mt-4">
             <ul class="pagination justify-content-end">
                 <li class="page-item disabled">
                     <a class="page-link" href="#" tabindex="-1">Previous</a>
                 </li>
                 <li class="page-item active"><a class="page-link" href="#">1</a></li>
                 <li class="page-item"><a class="page-link" href="#">2</a></li>
                 <li class="page-item"><a class="page-link" href="#">3</a></li>
                 <li class="page-item">
                     <a class="page-link" href="#">Next</a>
                 </li>
             </ul>
         </nav>
     </div>
 </div>
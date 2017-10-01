@extends('layouts')

@section('title', 'Referral system - Allaravel.com')
@section('controller','Product')
@section('action','List')

@section('content')
<div id="manage-vue">
    <div class="row" >
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Responsive Hover Table</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">

                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
                        Tạo sản phẩm mới
                    </button>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody>
                   <tr>
                        <th class="col-md-2">Name</th>
                        <th class="col-md-1">Price</th>
                        <th class="col-md-7">Content</th>
                        <th class="col-md-2">Action</th>
                    </tr>
                    <tr v-for="item in items">
                        <td>@{{ item.name }}</td>
                        <td>@{{ item.price }}</td>
                        <td>@{{ item.content }}</td>
                        <td>    
                            <button class="btn btn-primary" @click.prevent="editItem(item)">Edit</button>
                            <button class="btn btn-danger" @click.prevent="deleteItem(item)">Delete</button>
                        </td>
                    </tr>
                
                
              </tbody></table>
              <nav>
                    <ul class="pagination">
                        <li v-if="pagination.current_page > 1">
                            <a href="#" aria-label="Previous"
                               @click.prevent="changePage(pagination.current_page - 1)">
                                <span aria-hidden="true">«</span>
                            </a>
                        </li>
                        <li v-for="page in pagesNumber"
                            v-bind:class="[ page == isActived ? 'active' : '']">
                            <a href="#"
                               @click.prevent="changePage(page)">@{{ page }}</a>
                        </li>
                        <li v-if="pagination.current_page < pagination.last_page">
                            <a href="#" aria-label="Next"
                               @click.prevent="changePage(pagination.current_page + 1)">
                                <span aria-hidden="true">»</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

      <div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">Tạo sản phẩm mới  </h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" enctype="multipart/form-data" v-on:submit.prevent="createItem">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" class="form-control" v-model="newItem.name" />
                                <span v-if="formErrors['name']" class="error text-danger">@{{ formErrors['name'] }}</span>
                            </div>

                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="text" name="price" class="form-control" v-model="newItem.price" />
                                <span v-if="formErrors['price']" class="error text-danger">@{{ formErrors['price'] }}</span>
                            </div>

                            <div class="form-group">
                                <label for="content">Content:</label>
                                <textarea name="content" class="form-control" v-model="newItem.content"></textarea>
                                <span v-if="formErrors['content']" class="error text-danger">@{{ formErrors['content'] }}</span>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Tạo sản phẩm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Item Modal -->
        <div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">Chỉnh sửa sản phẩm</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" enctype="multipart/form-data" v-on:submit.prevent="updateItem(fillItem.id)">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" class="form-control" v-model="fillItem.name" />
                                <span v-if="formErrorsUpdate['name']" class="error text-danger">@{{ formErrorsUpdate['name'] }}</span>
                            </div>

                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="text" name="price" class="form-control" v-model="fillItem.price" />
                                <span v-if="formErrorsUpdate['price']" class="error text-danger">@{{ formErrorsUpdate['price'] }}</span>
                            </div>

                            <div class="form-group">
                                <label for="content">Content:</label>
                                <textarea name="content" class="form-control" v-model="fillItem.content"></textarea>
                                <span v-if="formErrorsUpdate['content']" class="error text-danger">@{{ formErrorsUpdate['content'] }}</span>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Cập nhật sản phẩm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('js')
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.4.4/vue.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/vue.resource/0.9.3/vue-resource.min.js"></script>

    <script type="text/javascript" src="{{ Asset('js/product.js') }}"></script>
@endsection
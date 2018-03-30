<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="myEvents.php">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" type="text">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" type="text" rows="6" cols="4">
                                            </textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Date</label>
                                            <input class="form-control" type="date" data-provide="datepicker">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Time</label>
                                            <div class="input-group clockpicker">
                                                <input type="text" class="form-control" value="09:30">
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-time"></span>
                                                    </span>
                                            </div>
                                            <script type="text/javascript" src="/home/sonia/Desktop/SIH/startbootstrap-sb-admin-2-gh-pages/js/clockpicker.js">
                                                $('.clockpicker').clockpicker();
                                            </script>
                                        </div>
                                        

                                        <div class="form-group">
                                            <label>Category</label>
                                            <input class="form-control" type="text">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Venue</label>
                                            <input class="form-control" type="text">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Send to</label>
                                            <div class="form-group input-group">
                                                <input type="text" class="form-control">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default" type="button"><i class="fa fa-search"></i>
                                                    </button>
                                                </span>
                                            </div> 
                                        </div>
                                        
                                        
                                        <button type="submit" class="btn btn-default">Submit Button</button>
                                        <button type="reset" class="btn btn-default">Reset Button</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
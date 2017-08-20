$(document).ready(function() {
	// fuelux datagrid
	var DataGridDataSource = function (options) {
		this._formatter = options.formatter;
		this._columns = options.columns;
		this._delay = options.delay;
	};

	DataGridDataSource.prototype = {

		columns: function () {
			return this._columns;
		},

		data: function (options, callback) {
			var url = '/admin/admin/get_qkd_new_list';
			var self = this;

			setTimeout(function () {

				var data = $.extend(true, [], self._data);

				$.ajax(url, {
					dataType: 'json',
					async: true,
					type: 'GET'
				}).done(function (response) {

					data = response.data;
					if (options.filter) {
						data = _.filter(data, function (item) {
							switch(options.filter.value) {
								case 'lt5m':
									if(item.population < 5000000) return true;
									break;
								case 'gte5m':
									if(item.population >= 5000000) return true;
									break;
								default:
									return true;
									break;
							}
						});
					}

					var count = data.length;
					// PAGING
					var startIndex = options.pageIndex * options.pageSize;
					var endIndex = startIndex + options.pageSize;
					var end = (endIndex > count) ? count : endIndex;
					var pages = Math.ceil(count / options.pageSize);
					var page = options.pageIndex + 1;
					var start = startIndex + 1;

					data = data.slice(startIndex, endIndex);

					if (self._formatter) self._formatter(data);

					callback({ data: data, start: start, end: end, count: count, pages: pages, page: page });
				}).fail(function(e){

				});
			}, self._delay);
		}
	};

    $('#MyStretchGrid').each(function() {
    	$(this).datagrid({
	        dataSource: new DataGridDataSource({
			    // Column definitions for Datagrid
			    columns: [
					{
						property: 'order_id',
						label: '订单编号',
						sortable: true
					},
					{
						property: 'qname',
						label: '姓名',
						sortable: true
					},
					{
						property: 'qtel',
						label: '电话',
						sortable: true
					},
					{
						property: 'school_name',
						label: '学校名称',
						sortable: true
					},
					{
						property: 'floor_name',
						label: '楼栋名称',
						sortable: true
					},
					{
						property: 'post_from',
						label: '快递公司',
						sortable: true
					},
					{
						property: 'post_type',
						label: '快递类型',
						sortable: true
					},
					{
						property: 'prove_info',
						label: '取货码',
						sortable: true
					},
					{
						property: 'remark',
						label: '备注',
						sortable: true
					},
					{
						property: 'creation_time',
						label: '订单时间',
						sortable: true
					},
					{
						property: 'id',
						label: '操作',
						sortable: true
					},
				],

			    // Create IMG tag for each returned image
			    formatter: function (items) {
			      $.each(items, function (index, item) {
			        item.id = '<a href="#" class="order_accept" onclick="accept(this);return false" data-id='+item.id+'><i class="icon-star">接单</i></a>&nbsp;&nbsp;<a class="order_del" href="#" onclick="del(this);return false" data-id='+item.id+'><i class="icon-star-empty" >删除</i></a>';
			      });
			    }
		  })
	    });
	});
});
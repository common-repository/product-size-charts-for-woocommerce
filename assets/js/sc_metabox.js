jQuery(function($){
	var table = $('#phoen-sc-metabox-table');
	num_rows = table.find( 'tr' ).length-1,
    num_cols = table.find( 'th' ).length - 1,
	h_table_input = $('#phoen-sc-table-hidden' ),


	build_col = function(cell_id){

		var tmp_col_btn = '<th><a href="javascript:void(0);" class="phoen-sc-add-col">+</a>	<a href="javascript:void(0);" class="phoen-sc-del-col">-</a></th>';
		
		tmp_col ='<td><input type="text" class="phoen-input-table" value=""></td>';
		 
		table.find( 'thead tr' ).find('th:eq(' + cell_id + ')').after(tmp_col_btn);
		
		table.find( 'tbody tr' ).each( function () {
			
		$( this ).find( 'td:eq(' + cell_id + ')' ).after( tmp_col );	
		});


},
	remove_col               = function ( cell_id ) {
            table.find( 'thead tr' ).find( 'th:eq(' + cell_id + ')' ).remove();
            table.find( 'tbody tr' ).each( function () {
                $( this ).find( 'td:eq(' + cell_id + ')' ).remove();
            } );
        },
	build_row                = function () {
            var tmp_row = '<tr>';
            for ( var i = 0; i < num_cols; i++ ) {
                tmp_row += '<td><input type="text" class="phoen-input-table" ></td>';
            }
            tmp_row += '<td class="phoen-sc-table-button-container"><a href="javascript:void(0);" class="phoen-sc-add-row">+</a>	<a href="javascript:void(0);" class="phoen-sc-del-row">-</a></td>';
            tmp_row += '</tr>';
            return tmp_row;
        },
		
	create_matrix_from_table = function () {
            var tmp_matrix = [];

            table.find( 'tbody tr' ).each( function () {
                var cols   = [],
                    all_td = $( this ).find( 'td' );
				

                all_td.each( function () {
                    if ( !$( this ).is( '.phoen-sc-table-button-container' ) ) {
                        var tmp_value = $( this ).find( 'input' ).val();
                      cols.push( tmp_value );
					   
                    }
                } );

               tmp_matrix.push( cols );
			
            } );

			
            
          h_table_input.val( JSON.stringify( tmp_matrix ) );
            
			
        };
		
	table
	.on( 'click', '.phoen-sc-add-row', function () {
		var this_cell = $( this ).closest( 'td' ),
			this_row  = this_cell.closest( 'tr' );

		num_rows++;
		this_row.after( build_row() );
		create_matrix_from_table();
	} )

	.on( 'click', '.phoen-sc-del-row', function () {
		if ( num_rows < 2 )
			return;

		var this_cell = $( this ).closest( 'td' ),
			this_row  = this_cell.closest( 'tr' );

		num_rows--;
		this_row.remove();
		create_matrix_from_table();
	} )

	.on( 'click', '.phoen-sc-add-col', function () {
		var this_cell = $( this ).closest( 'th' ),
			cell_id   = this_cell.index();

		num_cols++;
		build_col( cell_id );
		create_matrix_from_table();
	} )

	.on( 'click', '.phoen-sc-del-col', function () {
		if ( num_cols < 2 )
			return;
		var this_cell = $( this ).closest( 'th' ),
			cell_id   = this_cell.index();

		num_cols--;
		remove_col( cell_id );
		create_matrix_from_table();
	} )

	.on( 'keyup', 'input', function ( event ) {
		var this_input = $(event.target ),
			value = this_input.val();
			//alert(value);
		// remove html tags
		if( value.search(/<[^>]+>/ig) > 0 || value.search('<>') > 0 ){
			this_input.val( value.replace( /<[^>]+>/ig, '' ).replace('<>', '') );
		}
		create_matrix_from_table();
	} );
});
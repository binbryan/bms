<!-- Pagination -->
<nav aria-label='page navigation' class='pagination-sm float-right'>
	<ul class='pagination'>
		<!-- Prev Button -->
		<li class='page-item  <?php if ($page <= 1) { echo 'disabled'; } ?>'>
			<a class='page-link' aria-label='Previous' href='<?php echo '?page='. ($page - 1); ?>' id='prev'>
				<span class='' aria-hidden='true'>Prev</span>
			</a>
		</li>
		<!-- Prev Button Ends -->

		
		<?php 
		###########################################
			// Display Page Numbers.
			displayPageNum($page, $totalPages);
		###########################################

		
		// Increment Page Number.
		$page++;

		?>
		
		<!-- Next Button -->
		<li class='page-item <?php echo $class; ?>'>
			<a class='page-link' aria-label='Next' href='<?php if ($counter <= $totalPages) { echo "?page=". $page;  } ?>' id='next'>
				<span aria-hidden='true'> Next </span>
			</a>
		</li>
		<!-- Next Button Ends -->
	</ul>
</nav>
<!-- Pagination Ends -->

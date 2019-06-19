<!-- Pagination -->
<nav aria-label='page navigation' class='pagination-sm float-right'>
	<ul class='pagination'>
		<!-- First page Button -->
		<li class='page-item  <?php if ($page <= 1) { echo 'disabled'; } ?>'><a class='page-link' href="?page=1">First</a></li>
		<!-- First page Button ends -->

		<!-- Prev Button -->
		<li class='page-item <?php if ($page <= 1) { echo 'disabled'; } ?>'>
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
		$page++; ?>
		
		<!-- Next Button -->
		<li class='page-item <?php echo $class; ?>'>
			<a class='page-link' aria-label='Next' href='<?php if ($page <= $totalPages) { echo "?page=". $page;  } ?>' id='next'>
				<span aria-hidden='true'> Next </span>
			</a>
		</li>
		<!-- Next Button Ends -->

		<!-- Last page Button -->
		<li class='page-item <?php echo $class; ?>'><a class='page-link' href="?page=<?php echo $totalPages; ?>">Last</a></li>
		<!-- Last page Button ends -->
	</ul>
</nav>
<!-- Pagination Ends -->

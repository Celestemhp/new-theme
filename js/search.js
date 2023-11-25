new Vue({
	el: '#search-overlay',

	data() {
		return {
			// Handle search
			searchOpen: false,
			searchValue: '',
			delayTimer: null,
			showClearIcon: false,

			// Handle results
			searchResults: [],
			showResults: false,
			renderResultsContainer: false,

			// Handling Pagination
			pageSize: 10,
			currentPage: 0,
			numberOfPages: 0,
			hasPrevious: false,
			hasNext: false,
			numberOfResults: 0,

			// Employee status
			employee_status: {},

			// Post type translations
			postTypeMapping: {
				people: 'Starvsfólk',
				page: 'Síða',
				post: 'Grein',
				publication: 'Gransking',
				forms: 'Oyðiblað',
				tribe_events: 'Tiltak',
				jobs: 'Starv',
			},
		};
	},

	mounted() {
		document.addEventListener('click', this.handleClick);

		const headerInput = document.querySelector('.header-search-container input');

		if (headerInput) {
			headerInput.addEventListener('keyup', (e) => {
				if (e.key === 'Enter' && e.target.value.length > 0) {
					this.searchValue = e.target.value;
					this.searchOpen = true;
				}
			});
		}
	},

	watch: {
		searchValue(searchValue) {
			clearTimeout(this.delayTimer);
			this.showClearIcon = searchValue.length > 0;

			if (searchValue.length > 1) {
				const self = this;

				this.delayTimer = setTimeout(() => {
					self.handleSearch();
				}, 200);

				return;
			}

			this.clearResultList();
		},

		searchOpen(searchOpen) {
			if (!searchOpen) {
				document.querySelector('html').style.overflow = 'auto';
				this.searchValue = '';
				return;
			}

			document.querySelector('html').style.overflow = 'hidden';
		},
	},

	methods: {
		// Handle search
		handleSearch() {
			index
				.search(this.searchValue, {
					hitsPerPage: this.pageSize,
					page: this.currentPage,
				})
				.then((result) => {
					this.numberOfResults = result.nbHits;
					this.numberOfPages = result.nbHits / this.pageSize;
					this.hasPrevious = this.currentPage !== 0;
					this.hasNext = this.currentPage < result.nbHits / this.pageSize - 1;

					this.searchResults = result.hits;
					this.renderResultsContainer = true;

					this.showResults = true;
				});
		},

		clearResultList() {
			this.searchResults = [];

			this.currentPage = 0;
			this.numberOfPages = 0;
			this.numberOfResults = 0;
			this.hasPrevious = false;
			this.hasNext = false;
			this.showResults = false;

			this.renderResultsContainer = false;
		},

		// Handle pagination
		previousPage() {
			if (this.currentPage > 0) {
				this.currentPage = this.currentPage - 1;
				this.handleSearch();
			}
		},

		nextPage() {
			if (this.currentPage < this.numberOfPages) {
				this.currentPage = this.currentPage + 1;
				this.handleSearch();
			}
		},

		// Event listener
		handleClick(e) {
			if (e.target.closest('.header-search') || e.target.closest('.search-bg') || e.target.closest('.close-icon')) {
				e.preventDefault();
				if (this.searchOpen) {
					this.searchOpen = false;
					return;
				}

				this.openSearch();
			}
		},

		// Open search
		openSearch() {
			this.handleFocus();
			this.searchOpen = true;
		},

		// Close search
		closeSearch() {
			this.searchOpen = false;
		},

		// Add space to phone number
		spaceToNumber(num) {
			return num.replace(/\B(?=(\d{6})+(?!\d))/g, ' ');
		},

		// Reduce content length
		handleContent(html) {
			let tmp = document.createElement('DIV');
			tmp.innerHTML = html;
			const content = tmp.textContent || tmp.innerText || '';

			if (content.length > 120) {
				return content.substring(0, 120) + '...';
			}

			return content;
		},

		handleFocus() {
			document.querySelector('.search-container input').focus();
		},
	},
});

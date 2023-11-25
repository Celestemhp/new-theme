const lunnarMenu = new Vue({
	el: '#lunnar-menu-mobile',

	data: {
		active: false,
		menuItems: [],
		menu: [],
		menuLength: 1,

		levelTitles: {},

		levelUrls: {},
	},

	mounted() {
		const menu = JSON.parse(mainMenuJSON); // From menu.php

		menu.forEach((item) => {
			const parentID = Number(item.menu_item_parent);

			// if the menu item does not have a parent, there is no need to proceed
			if (!parentID) {
				this.addItem({ ...item, index: 0 });

				return;
				3;
			}

			// get the parent object, and add the item to its list of children
			const parent = this.getParent(parentID, this.menuItems);

			// if the parent somehow does not exist, we cannot add it
			if (!parent) {
				return;
			}

			this.addItem({ ...item, index: parent.index + 1 }, parent);
		});

		// add the outermost layer to this.menu
		this.menu = [this.menuItems];

		this.menuLength = this.menu.length;
	},

	watch: {
		active: function (value) {
			if (!value) {
				document.querySelector('html').style.overflowY = 'auto';

				setTimeout(() => {
					if (this.menu.length > 1) {
						// remove active state for menu items above current level
						this.menu.forEach((level) => {
							level.forEach((item) => {
								item.active = false;
							});
						});

						// slice the menu
						this.menu = this.menu.slice(0, 1);

						this.menuLength = this.menu.length;
					}
				}, 200);

				return;
			}

			document.querySelector('html').style.overflowY = 'hidden';
		},
	},

	methods: {
		// Add an item to the menu.
		addItem(item, parent = null) {
			if (parent) {
				parent.children.push(this.getMenuItem(item));

				return;
			}

			this.menuItems.push(this.getMenuItem(item));
		},

		// Get the relevant data from the menu item.
		getMenuItem(item) {
			return {
				id: item.ID,
				title: item.title,
				content: item.post_content,
				url: item.url,
				index: item.index,
				active: item.active,
				children: [],
			};
		},

		// Get the parent object (recursively).
		getParent(parentID, submenu) {
			let parent = null;

			// check the outermost layer
			submenu.forEach((item) => {
				if (item.id === parentID) {
					parent = item;
				}
			});

			// if the parent is not found in the outermost layer
			if (!parent) {
				submenu.forEach((item) => {
					if (!parent) {
						// recursively check children
						parent = this.getParent(parentID, item.children);
					}
				});
			}

			return parent;
		},

		// Navigate to url or go to level.
		go(e, currentItem) {
			// if the item does not have children, go to url
			if (!currentItem.children.length) {
				return;
			}

			// prevent navigation
			e.preventDefault();

			this.levelUrls[currentItem.index + 1] = currentItem.url === '#' ? '' : currentItem.url;

			console.log(this.levelUrls[currentItem.index + 1]);

			this.levelTitles[currentItem.index + 1] = currentItem.title;

			// remove active state for menu items above current level
			this.menu.slice(currentItem.index).forEach((level) => {
				level.forEach((item) => {
					if (currentItem.id === item.id) {
						item.active = true;
						return;
					}

					item.active = false;
				});
			});

			this.menuLength = this.menu.length;

			// if an currentItem is clicked below the current level, slice the menu
			if (this.menu.length > currentItem.index + 1) {
				this.menu = this.menu.slice(0, currentItem.index + 1);

				this.menuLength = this.menu.length;
			}

			// add a copy of the currentItem to this.menu
			this.menu.push([...currentItem.children]);

			this.menuLength = this.menu.length;
		},

		// Go back one level.
		back() {
			if (this.menu.length > 0) {
				this.menuLength = this.menu.length - 1;
				// slice the menu
				setTimeout(() => {
					this.menu = this.menu.slice(0, this.menu.length - 1);
				}, 200);
			}
		},
	},
});

(function ($) {
	/**
	 * Menu
	 * Toggle the menu on click.
	 */

	$(document).on('click', '.top-menu.for-mobile', (e) => {
		e.preventDefault();
		lunnarMenu.active = true;
	});

	window.addEventListener('keydown', (e) => {
		if (e.key === 'Escape') {
			lunnarMenu.active = false;
		}
	});
})(jQuery);

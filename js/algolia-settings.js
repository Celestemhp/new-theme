const client = algoliasearch(algolia_application_id, algolia_api_key);
const index_name = algolia_index_name;
const index = client.initIndex(index_name);

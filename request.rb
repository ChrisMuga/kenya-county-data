# frozen_string_literal: true

require_relative 'county'
require 'http'
require 'json'

class Request
  def initialize
    @base_endpoint = 'https://forms.iebc.or.ke'
  end

  def constituencies_endpoint(county_id)
    "#{@base_endpoint}/constituency/#{county_id}"
  end

  def wards_endpoint(constituency_id)
    "#{@base_endpoint}/wards/#{constituency_id}"
  end

  def fetch(url)
    HTTP.get(url).body
  end

  def exec
    counties_registry = []

    county = County.new
    all_counties = county.all_counties

    (1..47).each do |county_id|
      county_hash = {}
      url = constituencies_endpoint(county_id)
      body = fetch(url)

      county_hash['id'] = county_id
      county_hash['name'] = all_counties[county_id]

      counties_registry << county_hash

      puts "county ##{county_id} => #{all_counties[county_id]}"

      data = JSON.parse(body)

      constituencies = data['constituency'] || {}
      puts 'xxxx ====>', constituencies.inspect
      constituency_ids = constituencies.length.positive? ? constituencies.keys : []

      constituencies_list = []
      constituency_ids.each do |constituency_id|
        constituencies_hash = {}

        constituencies_hash['id'] = constituency_id
        constituencies_hash['name'] = constituencies[constituency_id]

        puts "====> ##{constituency_id}, #{constituencies[constituency_id
]}"
        wards_url = wards_endpoint(constituency_id)
        wards_body = fetch(wards_url)
        wards_data = JSON.parse(wards_body)
        wards = wards_data['wards']
        ward_ids = wards.keys

        wards_list = []
        ward_ids.each do |ward_id|
          wards_hash = {}
          wards_hash['id'] = ward_id
          wards_hash['name'] = wards[ward_id]

          wards_list << wards_hash
          puts wards[ward_id]
        end
        constituencies_hash['wards'] = wards_list
        constituencies_list << constituencies_hash
      end
      county_hash['constituencies'] = constituencies_list
      counties_registry << county_hash
    end
    puts 'Counties ===>', counties_registry

    File.write('output.json', counties_registry.to_json)
  end
end

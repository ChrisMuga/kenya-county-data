# frozen_string_literal: true

require_relative 'request'

request = Request.new
begin
  request.exec
  puts "Success. File generated at ./output.json"
rescue => e
  puts "Error!", "========", e, "Couldn't generate file"
end

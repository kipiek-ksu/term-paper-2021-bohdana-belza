program prosti_19;
var a,b:integer;
begin
read(a);
b:= ((a mod 100) div 10)*1000+((a mod 1000) div 100)*100+(a div 1000)*10+a mod 10;
write(b);
end.
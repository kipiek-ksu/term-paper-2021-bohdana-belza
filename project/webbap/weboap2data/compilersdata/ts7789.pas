program L_2_65;
var min,h,m:integer;
begin
read(min);
h:=min div 60;
m:=min-(60*h);
write(h,,m);
end.

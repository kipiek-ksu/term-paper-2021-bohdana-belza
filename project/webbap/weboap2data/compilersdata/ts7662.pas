program f;
var a,b,c:integer;
begin
read (a);
read (b);
read (c);
if ((a+b)>c) and ((b+c)>a) and ((a+c)>b) then write ('yes') else
write ('no');
end.
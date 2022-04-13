program Max;
var a:set of char;
    s:string;
    m,i:integer;
begin
a:=['A'..'Z'];
read(s);
h:=0;
For i:=1 to length(s) do
if s[i] in a then m:=m+1;
write (m);
end.

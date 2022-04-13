program max;
var a:set of char;
    s:string;
    i,k,buf,sum:integer;
begin
read(s);
a:=['1','2','3','4','5','6','7','8','9'];
For i:=1 to Length(s) do
if s[i] in a then
 begin
 val (s[i],sum,buf);
 k:=k+sum;
 end;
write(k);
end.
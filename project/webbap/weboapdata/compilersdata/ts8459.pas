program z5;
var a:set of char; i,k:integer; s:string;
begin
a:=['.',';',':','.','!','?','-',','];
read (s);
k:=0;
for i:=1 to length(s) do
if s[i] in a then k:=k+1;
write (k);
end.

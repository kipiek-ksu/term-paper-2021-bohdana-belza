program z1;
var a:set of byte;i,j:integer;s1:string;
begin
readln(s1);
for i:=1 to length(s1) do
begin
a:=a+[s1[i]];
if ['.'] in a do
begin
j:=j+1;
a:=a-['.'];

writeln(j+1);



end.
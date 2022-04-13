type boo=set of char;
var s,k,v:boo; i,j,min:integer; str:string; sim:char;
begin
min:=1;
s:=['a', 'e', 'i', 'o', 'u', 'y'];
readln(str);
str:=str+' ';
for i:=1 to length(str) do
if ord(str[i])=32 then
                  begin
                  s:=s*v;
                  v:=[];
                  end
                  else
                  v:=v+[str[i]];
                  str:='';
for i :=97 to 122 do
begin
sim:=chr(i);
if sim in s then
            if min=1 then
                         begin
                         str:=str+sim;
                         min:=min+1;
                         end
            else str:=str+' '+sim;
end;
if str='' then writeln('NO') else writeln(str);
end.
program ks;
var a,b:byte;s:word;v1,v2:real;
begin
read(a,b,s);
v1:=s/a;
v2:=s/b;
write(v1:5:3,' ',v2:5:3);
end.
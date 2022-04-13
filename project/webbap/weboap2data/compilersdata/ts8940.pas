program b1;
type point=^item;
item=record
data:integer;
right,left:point;
end;
var p,first:point;
begin
new(p);
first:=p;
read(p^.data);
new(p^.right);
read(p^.right^.data);
new(p^.left);
read(p^.left^.data);
p:=p^.left;
new(p^.right);
read(p^.right^.data);
new(p^.left);
read(p^.left^.data);
p:=p^.right;
p^.right:=first^.left^.left;
p^.left:=first;
p:=first^.right;
new(p^.left);
read(p^.left^.data);
p^.right:=first^.left;
p:=p^.left;
p^.left:=first^.right;
p^.right:=first^.left^.left;
p:=p^.right;
p^.left:=nil;
p^.right:=nil;
p:=first;write(p^.data);write(' ');
p:=p^.right;write(p^.data);write(' ');
p:=first^.left^.left;write(p^.data);
writeln('');
p:=first;write(p^.data);write(' ');
p:=p^.left;write(p^.data);write(' ');
p:=first;write(p^.data);write(' ');
p:=p^.right;write(p^.data);write(' ');
p:=p^.left;write(p^.data);write(' ');
p:=first^.left^.left;write(p^.data);
end.


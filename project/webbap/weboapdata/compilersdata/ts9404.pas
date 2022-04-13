program b1;

type point=^item;
item=record
data:integer;
right,left:point;
end;
var p,first:point;
begin
clrscr;
new(p);
first:=p;
write('x1');
read(p^.data);
new(p^.left);
write('x2');
read(p^.left^.data);
p:=p^.left;
new(p^.left);
write('x3');
read(p^.left^.data);
p:=first;
new(p^.right);
write('x4');
read(p^.right^.data);
p:=first^.left;
new(p^.right);
write('x5');
read(p^.right^.data);
p:=p^.left;
p^.left:=nil;
new(p^.right);
write('x6');
read(p^.right^.data);
p:=first^.right;
p^.left:=first^.left;
p^.right:=first^.left^.right;
p:=p^.right;
p^.left:=first^.left^.left;
p^.right:=first^.left^.left^.right;
p:=p^.right;
p^.left:=nil;
p^.right:=nil;
p:=first;write(p^.data);
p:=p^.left;write(p^.data);
p:=p^.left;write(p^.data);
p:=p^.right;write(p^.data);

p:=first;write(p^.data);
p:=p^.right;write(p^.data);
p:=p^.left;write(p^.data);
p:=p^.right;write(p^.data);
p:=p^.left;write(p^.data);
p:=p^.right;write(p^.data);

end.
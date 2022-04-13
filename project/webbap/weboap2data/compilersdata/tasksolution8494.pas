program z17;
type point=^item;
     item=record
     digit:integer;
     p:point;
     end;
     var i,j,n,h:integer;l,f:point;
procedure add(var l:point;k:integer;f:point);
var g:point;
begin
     new(g);
    l^.p:=g;
    g^.digit:=k;
    g^.p:=nil;
    l:=g;end;

function del(var f:point):integer;
var g:point;
begin
    del:=f^.digit;
    g:=f;
    f:=f^.p;
    dispose(g);

    end;


procedure out(var l:point;f:point);
var g:point;
begin
    g:=f;
    while(g<>nil) do
    begin
    write(g^.digit,' ');
    g:=g^.p;
    end;

end;

begin
readln(n);
l:=nil;
F:=nil;
readln(j);
new(f);
l:=f;
f^.digit:=j;
f^.p:=nil;
for i:=2 to n do
    begin
    readln(j);
    add(l,j,f);
    end;
h:=del(f);
out(l,f);
writeln;
writeln(h);
end.
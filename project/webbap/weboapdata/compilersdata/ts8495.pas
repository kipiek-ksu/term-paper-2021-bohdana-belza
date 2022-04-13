type point=^Item;
     item=record
                data:integer;
                next:point;
     end;
var k,f:point; n,i,x:integer;

procedure out(f:point);
var
   t:point;
begin
     t:=f;
     while t<>nil do
     begin
          write(t^.data,' ');
          t:=t^.next;
     end;
     writeln;
end;

function del(var f:point):integer;
var t:point;
    r:integer;
begin
     t:=f;
     r:=t^.data;
     f:=f^.next;
     dispose(t);
     del:=r;
end;

procedure add(var k:point; r:integer);
var p:point;
begin
     new(p);
     p^.data:=r;
     k^.next:=p;
     k:=p;
     p^.next:=nil;
end;

Begin
     readln(n);
     new(f);
     f^.next:=nil;
     k:=f;
     readln(x);
     f^.data:=x;
     for i:=2 to n do
     begin
          readln(x);
          add(k,x);
     end;
     x:=del(f);
     out(f);
     writeln(x);
End.
